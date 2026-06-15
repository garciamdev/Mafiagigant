<?php

// Initialize user prizes as an empty array if it doesn't exist
if (!isset($_SESSION['user_prizes'])) {
    $_SESSION['user_prizes'] = array();
}

// Function to add a prize to the user's list
function addPrize($prize) {
    $_SESSION['user_prizes'][] = $prize;
}

// Function to get the user's prizes
function getUserPrizes() {
    return $_SESSION['user_prizes'];
}
?>

<style>

  .wheel {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: conic-gradient(
      from 0deg,
      red 0% 12.5%,
      blue 12.5% 25%,
      green 25% 37.5%,
      yellow 37.5% 50%,
      purple 50% 62.5%,
      orange 62.5% 75%,
      pink 75% 87.5%,
      brown 87.5% 100%
    );
    animation: spin 0s infinite linear;
    position: relative;
  }
  .wheel .segment {
    position: absolute;
    width: 100px;
    text-align: center;
    transform: translateX(50%) translateY(-50%);
    color: white;
    font-weight: bold;
  }
  .segment::before {
    content: attr(data-prize);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  .segment:nth-child(1) {
    --deg: 0;
  }
  .segment:nth-child(2) {
    --deg: 45;
  }
  .segment:nth-child(3) {
    --deg: 90;
  }
  .segment:nth-child(4) {
    --deg: 135;
  }
  .segment:nth-child(5) {
    --deg: 180;
  }
  .segment:nth-child(6) {
    --deg: 225;
  }
  .segment:nth-child(7) {
    --deg: 270;
  }
  .segment:nth-child(8) {
    --deg: 315;
  }
  .button-container {
    margin-top: 20px;
  }
  .spin-button {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>

<div class="wheel-container">
  <div class="wheel">
    <div class="segment" style="--deg: 0;">$100</div>
    <div class="segment" style="--deg: 45;">Bullets</div>
    <div class="segment" style="--deg: 90;">$50</div>
    <div class="segment" style="--deg: 135;">Credits</div>
    <div class="segment" style="--deg: 180;">$200</div>
    <div class="segment" style="--deg: 225;">$10</div>
    <div class="segment" style="--deg: 270;">$150</div>
    <div class="segment" style="--deg: 315;">Bullets</div>
  </div>
</div>
<div class="button-container">
  <button class="spin-button" onclick="spinWheel()">Draai het rad</button>
</div>
<div class="prizes-container">
  <h2>Your Prizes:</h2>
  <ul id="prizes-list"></ul>
</div>
<script>
  function spinWheel() {
    const wheel = document.querySelector('.wheel');
    const segments = document.querySelectorAll('.segment');
    
    // Disable the button while spinning
    document.querySelector('.spin-button').disabled = true;
    
    const randomDegree = Math.floor(Math.random() * 360);
    const rotation = 1440 + randomDegree; // 4 full rotations (1440 degrees) + random stop degree
    
    wheel.style.transition = 'transform 5s ease-out';
    wheel.style.transform = `rotate(${rotation}deg`;
    
    setTimeout(() => {
      const selectedSegment = Math.floor((rotation % 360) / 45);
      const prize = segments[selectedSegment].textContent;
      alert(`You won: ${prize}`);
      
      // Add the prize to the user's list (PHP session)
      addPrize(prize);
      
      // Re-enable the button after the spin is complete
      document.querySelector('.spin-button').disabled = false;

      // Update the displayed list of user prizes
      updatePrizesList();
    }, 6000); // Adjust the timeout to match the animation duration
  }

  // Function to update the displayed list of user prizes
  function updatePrizesList() {
    const prizesList = document.getElementById('prizes-list');
    prizesList.innerHTML = '';
    <?php
      foreach (getUserPrizes() as $prize) {
        echo "const listItem = document.createElement('li');";
        echo "listItem.textContent = '$prize';";
        echo "prizesList.appendChild(listItem);";
      }
    ?>
  }

  // Call updatePrizesList() to initialize the prize list when the page loads
  updatePrizesList();
</script>



