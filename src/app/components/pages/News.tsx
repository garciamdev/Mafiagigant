import { useState } from "react";
import { motion, AnimatePresence } from "motion/react";
import {
  Plus, Trash2, Edit3, Calendar, Tag, Save, X, Megaphone,
  CheckCircle, Clock, Pin
} from "lucide-react";

type NewsCategory = "update" | "project" | "job" | "achievement" | "other";

interface NewsItem {
  id: number;
  title: string;
  body: string;
  category: NewsCategory;
  date: Date;
  pinned: boolean;
}

const catLabels: Record<NewsCategory, string> = {
  update: "Update",
  project: "Projekt",
  job: "Job / Arbeit",
  achievement: "Erfolg",
  other: "Sonstiges",
};

const catColor: Record<NewsCategory, string> = {
  update: "#39ff14",
  project: "#00d4ff",
  job: "#a855f7",
  achievement: "#fbbf24",
  other: "#71717a",
};

const initialNews: NewsItem[] = [
  {
    id: 1,
    title: "React Native App v2.0 veröffentlicht",
    body: "Nach drei Monaten Entwicklung ist BudgetTrack v2.0 jetzt live. Das Update bringt Offline-Sync, Biometric Auth und ein komplett überarbeitetes UI. Feedback willkommen!",
    category: "project",
    date: new Date("2024-12-01"),
    pinned: true,
  },
  {
    id: 2,
    title: "AWS Cloud Practitioner Zertifikat bestanden",
    body: "Ich habe heute mein AWS Cloud Practitioner Zertifikat mit 94% bestanden! Als nächstes kommt die Solutions Architect Prüfung auf dem Plan.",
    category: "achievement",
    date: new Date("2024-11-20"),
    pinned: false,
  },
  {
    id: 3,
    title: "Open für Freelance-Projekte ab Januar 2025",
    body: "Ich bin ab Januar 2025 wieder verfügbar für Freelance-Anfragen. Schwerpunkte: React/Next.js, Python APIs, Datenbankoptimierung. Meldet euch gerne!",
    category: "job",
    date: new Date("2024-11-10"),
    pinned: false,
  },
];

export function News() {
  const [items, setItems] = useState<NewsItem[]>(initialNews);
  const [showForm, setShowForm] = useState(false);
  const [editId, setEditId] = useState<number | null>(null);
  const [form, setForm] = useState({
    title: "",
    body: "",
    category: "update" as NewsCategory,
    pinned: false,
  });

  function openNew() {
    setForm({ title: "", body: "", category: "update", pinned: false });
    setEditId(null);
    setShowForm(true);
  }

  function openEdit(item: NewsItem) {
    setForm({ title: item.title, body: item.body, category: item.category, pinned: item.pinned });
    setEditId(item.id);
    setShowForm(true);
  }

  function save() {
    if (!form.title.trim() || !form.body.trim()) return;
    if (editId !== null) {
      setItems((prev) => prev.map((i) => i.id === editId ? { ...i, ...form } : i));
    } else {
      setItems((prev) => [
        { id: Date.now(), ...form, date: new Date() },
        ...prev,
      ]);
    }
    setShowForm(false);
  }

  function remove(id: number) {
    setItems((prev) => prev.filter((i) => i.id !== id));
  }

  function togglePin(id: number) {
    setItems((prev) => prev.map((i) => i.id === id ? { ...i, pinned: !i.pinned } : i));
  }

  const sorted = [...items].sort((a, b) => {
    if (a.pinned && !b.pinned) return -1;
    if (!a.pinned && b.pinned) return 1;
    return b.date.getTime() - a.date.getTime();
  });

  return (
    <div className="min-h-screen pt-16" style={{ background: "#09090b" }}>
      {/* Header */}
      <div style={{ borderBottom: "1px solid rgba(57,255,20,0.1)", background: "#0d0d10" }}>
        <div className="max-w-4xl mx-auto px-6 py-16 flex flex-wrap items-end justify-between gap-6">
          <div>
            <p
              className="mb-3"
              style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14", letterSpacing: "0.15em" }}
            >
              // NEUIGKEITEN
            </p>
            <h1
              style={{ fontFamily: "var(--font-display)", fontSize: "clamp(2.2rem, 5vw, 3.5rem)", fontWeight: 700, color: "#e4e4e7" }}
            >
              News & Updates
            </h1>
            <p className="mt-3" style={{ color: "#71717a" }}>
              Aktuelle Meldungen, die auch als Ticker auf der Startseite erscheinen.
            </p>
          </div>
          <button
            onClick={openNew}
            className="flex items-center gap-2 px-5 py-3 rounded transition-all hover:scale-[1.02]"
            style={{
              background: "#39ff14",
              color: "#050505",
              fontFamily: "var(--font-mono)",
              fontSize: "0.78rem",
              fontWeight: 700,
              boxShadow: "0 0 20px rgba(57,255,20,0.2)",
            }}
          >
            <Plus size={15} /> Neue Meldung
          </button>
        </div>
      </div>

      <div className="max-w-4xl mx-auto px-6 py-12">
        {/* Form */}
        <AnimatePresence>
          {showForm && (
            <motion.div
              initial={{ opacity: 0, y: -20 }}
              animate={{ opacity: 1, y: 0 }}
              exit={{ opacity: 0, y: -20 }}
              className="rounded-xl p-6 mb-8"
              style={{ background: "#111115", border: "1px solid rgba(57,255,20,0.25)" }}
            >
              <div className="flex items-center justify-between mb-5">
                <h3
                  style={{ fontFamily: "var(--font-display)", fontSize: "1.15rem", fontWeight: 600, color: "#e4e4e7" }}
                >
                  {editId ? "Meldung bearbeiten" : "Neue Meldung"}
                </h3>
                <button onClick={() => setShowForm(false)} style={{ color: "#71717a" }}>
                  <X size={18} />
                </button>
              </div>

              <div className="space-y-4">
                <div>
                  <label
                    style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#71717a", display: "block", marginBottom: "0.5rem" }}
                  >
                    Titel *
                  </label>
                  <input
                    value={form.title}
                    onChange={(e) => setForm((f) => ({ ...f, title: e.target.value }))}
                    placeholder="Kurzer, prägnanter Titel..."
                    className="w-full px-4 py-3 rounded outline-none transition-all"
                    style={{
                      background: "#1c1c21",
                      border: "1px solid rgba(57,255,20,0.15)",
                      color: "#e4e4e7",
                      fontSize: "0.9rem",
                    }}
                    onFocus={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.4)")}
                    onBlur={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.15)")}
                  />
                </div>

                <div>
                  <label
                    style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#71717a", display: "block", marginBottom: "0.5rem" }}
                  >
                    Inhalt *
                  </label>
                  <textarea
                    value={form.body}
                    onChange={(e) => setForm((f) => ({ ...f, body: e.target.value }))}
                    placeholder="Details zur Meldung..."
                    rows={4}
                    className="w-full px-4 py-3 rounded outline-none transition-all resize-none"
                    style={{
                      background: "#1c1c21",
                      border: "1px solid rgba(57,255,20,0.15)",
                      color: "#e4e4e7",
                      fontSize: "0.88rem",
                      lineHeight: 1.6,
                    }}
                    onFocus={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.4)")}
                    onBlur={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.15)")}
                  />
                </div>

                <div className="flex flex-wrap gap-4 items-center">
                  <div>
                    <label
                      style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#71717a", display: "block", marginBottom: "0.5rem" }}
                    >
                      Kategorie
                    </label>
                    <select
                      value={form.category}
                      onChange={(e) => setForm((f) => ({ ...f, category: e.target.value as NewsCategory }))}
                      className="px-3 py-2 rounded outline-none"
                      style={{
                        background: "#1c1c21",
                        border: "1px solid rgba(57,255,20,0.15)",
                        color: "#e4e4e7",
                        fontFamily: "var(--font-mono)",
                        fontSize: "0.75rem",
                      }}
                    >
                      {(Object.keys(catLabels) as NewsCategory[]).map((k) => (
                        <option key={k} value={k}>{catLabels[k]}</option>
                      ))}
                    </select>
                  </div>

                  <label className="flex items-center gap-2 cursor-pointer mt-5">
                    <input
                      type="checkbox"
                      checked={form.pinned}
                      onChange={(e) => setForm((f) => ({ ...f, pinned: e.target.checked }))}
                      className="w-4 h-4 rounded"
                      style={{ accentColor: "#39ff14" }}
                    />
                    <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.72rem", color: "#71717a" }}>
                      Oben anheften
                    </span>
                  </label>
                </div>

                <div className="flex items-center gap-3 pt-2">
                  <button
                    onClick={save}
                    className="flex items-center gap-2 px-5 py-2.5 rounded transition-all hover:scale-[1.02]"
                    style={{
                      background: "#39ff14",
                      color: "#050505",
                      fontFamily: "var(--font-mono)",
                      fontSize: "0.75rem",
                      fontWeight: 700,
                    }}
                  >
                    <Save size={13} /> Speichern
                  </button>
                  <button
                    onClick={() => setShowForm(false)}
                    className="px-5 py-2.5 rounded transition-all"
                    style={{
                      border: "1px solid rgba(57,255,20,0.15)",
                      color: "#71717a",
                      fontFamily: "var(--font-mono)",
                      fontSize: "0.75rem",
                    }}
                  >
                    Abbrechen
                  </button>
                </div>
              </div>
            </motion.div>
          )}
        </AnimatePresence>

        {/* News list */}
        {sorted.length === 0 ? (
          <div className="text-center py-24" style={{ color: "#71717a", fontFamily: "var(--font-mono)", fontSize: "0.85rem" }}>
            Noch keine Meldungen. Erstelle jetzt die erste!
          </div>
        ) : (
          <div className="space-y-5">
            <AnimatePresence>
              {sorted.map((item) => (
                <motion.div
                  key={item.id}
                  layout
                  initial={{ opacity: 0, x: -20 }}
                  animate={{ opacity: 1, x: 0 }}
                  exit={{ opacity: 0, x: 20 }}
                  className="group rounded-xl p-6 transition-all duration-200"
                  style={{
                    background: "#111115",
                    border: item.pinned
                      ? "1px solid rgba(57,255,20,0.3)"
                      : "1px solid rgba(57,255,20,0.1)",
                    boxShadow: item.pinned ? "0 0 20px rgba(57,255,20,0.04)" : "none",
                  }}
                >
                  <div className="flex items-start justify-between gap-4">
                    <div className="flex-1 min-w-0">
                      <div className="flex flex-wrap items-center gap-2 mb-2">
                        {item.pinned && (
                          <Pin size={12} style={{ color: "#39ff14", flexShrink: 0 }} />
                        )}
                        <span
                          className="px-2 py-0.5 rounded-full"
                          style={{
                            fontFamily: "var(--font-mono)",
                            fontSize: "0.6rem",
                            color: catColor[item.category],
                            background: `${catColor[item.category]}18`,
                            border: `1px solid ${catColor[item.category]}30`,
                          }}
                        >
                          {catLabels[item.category]}
                        </span>
                        <span className="flex items-center gap-1" style={{ fontFamily: "var(--font-mono)", fontSize: "0.65rem", color: "#3f3f46" }}>
                          <Clock size={10} /> {item.date.toLocaleDateString("de-DE")}
                        </span>
                      </div>
                      <h3
                        className="mb-2"
                        style={{ fontFamily: "var(--font-display)", fontSize: "1.1rem", fontWeight: 600, color: "#e4e4e7" }}
                      >
                        {item.title}
                      </h3>
                      <p style={{ fontSize: "0.83rem", color: "#71717a", lineHeight: 1.65 }}>{item.body}</p>
                    </div>

                    <div className="flex items-center gap-1 shrink-0 opacity-0 group-hover:opacity-100 transition-opacity">
                      <button
                        onClick={() => togglePin(item.id)}
                        className="p-2 rounded transition-all hover:text-[#39ff14]"
                        style={{ color: item.pinned ? "#39ff14" : "#71717a" }}
                        title={item.pinned ? "Lösen" : "Anheften"}
                      >
                        <Pin size={14} />
                      </button>
                      <button
                        onClick={() => openEdit(item)}
                        className="p-2 rounded transition-all hover:text-[#39ff14]"
                        style={{ color: "#71717a" }}
                        title="Bearbeiten"
                      >
                        <Edit3 size={14} />
                      </button>
                      <button
                        onClick={() => remove(item.id)}
                        className="p-2 rounded transition-all hover:text-[#ef4444]"
                        style={{ color: "#71717a" }}
                        title="Löschen"
                      >
                        <Trash2 size={14} />
                      </button>
                    </div>
                  </div>
                </motion.div>
              ))}
            </AnimatePresence>
          </div>
        )}
      </div>
    </div>
  );
}
