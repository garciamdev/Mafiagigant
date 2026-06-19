/**
 * Mafiagigant Chat - moderne, schlanke Version (kein jQuery noetig).
 * Funktioniert fuer Mini-Chat und grossen Chat: das Limit kommt aus
 * dem data-limit-Attribut des Containers #mg-chat.
 */
(function () {
  'use strict';

  var root = document.getElementById('mg-chat');
  if (!root) { return; }

  var base = '/themes/general/chat/';
  var limit = parseInt(root.getAttribute('data-limit'), 10) || 8;

  var elMessages = root.querySelector('.mg-chat-messages');
  var elInput    = root.querySelector('.mg-chat-input');
  var elSend     = root.querySelector('.mg-chat-send');
  var elEmojiBtn = root.querySelector('.mg-chat-emoji-btn');
  var elEmojiBox = root.querySelector('.mg-chat-emoji-panel');

  var lastSignature = '';

  // Beliebte Emojis fuer den Picker.
  var EMOJIS = ['😀','😂','😉','😎','😍','🤔','😏','😅','😭','😡',
                '👍','👎','🙏','💪','🔥','💀','💰','💵','💎','🍀',
                '🚗','🔫','💣','🥃','🍻','🎲','🏆','👊','🤝','❤️'];

  function escapeHtml(str) {
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#39;');
  }

  // Stabile Farbe pro Benutzername (fuer den Avatar-Punkt).
  function colorFor(name) {
    var hash = 0;
    for (var i = 0; i < name.length; i++) {
      hash = name.charCodeAt(i) + ((hash << 5) - hash);
    }
    return 'hsl(' + (Math.abs(hash) % 360) + ', 55%, 45%)';
  }

  function render(messages) {
    var signature = JSON.stringify(messages);
    if (signature === lastSignature) { return; } // nichts Neues -> kein Neuzeichnen
    lastSignature = signature;

    var atBottom = elMessages.scrollHeight - elMessages.scrollTop - elMessages.clientHeight < 40;

    if (!messages.length) {
      elMessages.innerHTML = '<div class="mg-chat-empty">Noch keine Nachrichten. Schreib die erste! 👋</div>';
      return;
    }

    var html = '';
    for (var i = 0; i < messages.length; i++) {
      var m = messages[i];
      var u = escapeHtml(m.username);
      html +=
        '<div class="mg-chat-msg">' +
          '<span class="mg-chat-avatar" style="background:' + colorFor(u) + '">' +
            u.charAt(0).toUpperCase() +
          '</span>' +
          '<div class="mg-chat-body">' +
            '<a class="mg-chat-user" href="member/' + encodeURIComponent(m.username) + '">' + u + '</a>' +
            '<span class="mg-chat-time">' + escapeHtml(m.time) + '</span>' +
            '<div class="mg-chat-text">' + escapeHtml(m.message) + '</div>' +
          '</div>' +
        '</div>';
    }
    elMessages.innerHTML = html;

    if (atBottom) {
      elMessages.scrollTop = elMessages.scrollHeight;
    }
  }

  function loadMessages() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', base + 'load_messages.php?limit=' + limit, true);
    xhr.onload = function () {
      if (xhr.status !== 200) { return; }
      try { render(JSON.parse(xhr.responseText)); } catch (e) { /* ignore */ }
    };
    xhr.send();
  }

  function sendMessage() {
    var text = elInput.value.trim();
    if (text === '') { return; }
    elInput.value = '';

    var xhr = new XMLHttpRequest();
    xhr.open('POST', base + 'submit_message.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () { loadMessages(); };
    xhr.send('message=' + encodeURIComponent(text));
  }

  // --- Emoji-Picker aufbauen ---
  if (elEmojiBox) {
    var picker = '';
    for (var e = 0; e < EMOJIS.length; e++) {
      picker += '<button type="button" class="mg-emoji">' + EMOJIS[e] + '</button>';
    }
    elEmojiBox.innerHTML = picker;

    elEmojiBox.addEventListener('click', function (ev) {
      if (ev.target.classList.contains('mg-emoji')) {
        elInput.value += ev.target.textContent;
        elInput.focus();
      }
    });

    elEmojiBtn.addEventListener('click', function () {
      elEmojiBox.classList.toggle('open');
    });

    document.addEventListener('click', function (ev) {
      if (!root.contains(ev.target)) { elEmojiBox.classList.remove('open'); }
    });
  }

  // --- Events ---
  elSend.addEventListener('click', sendMessage);
  elInput.addEventListener('keydown', function (ev) {
    if (ev.key === 'Enter') { ev.preventDefault(); sendMessage(); }
  });

  // --- Start ---
  loadMessages();
  setInterval(loadMessages, 3000);
})();
