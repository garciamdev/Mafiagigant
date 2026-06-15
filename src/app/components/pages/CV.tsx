import { useState, useRef } from "react";
import { motion } from "motion/react";
import {
  Upload, Download, FileText, CheckCircle, AlertCircle,
  Eye, Trash2, Calendar, HardDrive
} from "lucide-react";

interface UploadedFile {
  name: string;
  size: number;
  uploadedAt: Date;
  url: string;
}

export function CV() {
  const [uploaded, setUploaded] = useState<UploadedFile | null>(null);
  const [dragging, setDragging] = useState(false);
  const [uploading, setUploading] = useState(false);
  const [error, setError] = useState<string | null>(null);
  const fileInputRef = useRef<HTMLInputElement>(null);

  function handleFile(file: File) {
    if (file.type !== "application/pdf") {
      setError("Bitte nur PDF-Dateien hochladen.");
      return;
    }
    if (file.size > 10 * 1024 * 1024) {
      setError("Datei darf maximal 10 MB groß sein.");
      return;
    }
    setError(null);
    setUploading(true);
    // Simulate upload
    setTimeout(() => {
      setUploaded({
        name: file.name,
        size: file.size,
        uploadedAt: new Date(),
        url: URL.createObjectURL(file),
      });
      setUploading(false);
    }, 1800);
  }

  function handleDrop(e: React.DragEvent) {
    e.preventDefault();
    setDragging(false);
    const file = e.dataTransfer.files[0];
    if (file) handleFile(file);
  }

  function formatSize(bytes: number) {
    if (bytes < 1024) return `${bytes} B`;
    if (bytes < 1024 * 1024) return `${(bytes / 1024).toFixed(1)} KB`;
    return `${(bytes / 1024 / 1024).toFixed(1)} MB`;
  }

  return (
    <div className="min-h-screen pt-16" style={{ background: "#09090b" }}>
      {/* Header */}
      <div style={{ borderBottom: "1px solid rgba(57,255,20,0.1)", background: "#0d0d10" }}>
        <div className="max-w-4xl mx-auto px-6 py-16">
          <p
            className="mb-3"
            style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14", letterSpacing: "0.15em" }}
          >
            // LEBENSLAUF
          </p>
          <h1
            style={{ fontFamily: "var(--font-display)", fontSize: "clamp(2.2rem, 5vw, 3.5rem)", fontWeight: 700, color: "#e4e4e7" }}
          >
            Mein Lebenslauf
          </h1>
          <p className="mt-4" style={{ color: "#71717a", lineHeight: 1.7 }}>
            Lade hier deinen aktuellen Lebenslauf als PDF hoch. Besucher können ihn direkt herunterladen.
          </p>
        </div>
      </div>

      <div className="max-w-4xl mx-auto px-6 py-16">
        <div className="grid lg:grid-cols-5 gap-8">
          {/* Upload area */}
          <div className="lg:col-span-3">
            <h2
              className="mb-6"
              style={{ fontFamily: "var(--font-display)", fontSize: "1.4rem", fontWeight: 600, color: "#e4e4e7" }}
            >
              PDF hochladen
            </h2>

            <div
              className="relative rounded-xl p-10 text-center transition-all duration-300 cursor-pointer"
              style={{
                border: `2px dashed ${dragging ? "#39ff14" : "rgba(57,255,20,0.2)"}`,
                background: dragging ? "rgba(57,255,20,0.04)" : "rgba(57,255,20,0.01)",
              }}
              onDragOver={(e) => { e.preventDefault(); setDragging(true); }}
              onDragLeave={() => setDragging(false)}
              onDrop={handleDrop}
              onClick={() => fileInputRef.current?.click()}
            >
              <input
                ref={fileInputRef}
                type="file"
                accept=".pdf"
                className="hidden"
                onChange={(e) => e.target.files?.[0] && handleFile(e.target.files[0])}
              />

              {uploading ? (
                <div className="flex flex-col items-center gap-4">
                  <div
                    className="w-14 h-14 rounded-full flex items-center justify-center"
                    style={{ border: "2px solid rgba(57,255,20,0.3)", background: "rgba(57,255,20,0.06)" }}
                  >
                    <div
                      className="w-6 h-6 rounded-full border-2 border-t-transparent animate-spin"
                      style={{ borderColor: "#39ff14", borderTopColor: "transparent" }}
                    />
                  </div>
                  <p style={{ fontFamily: "var(--font-mono)", fontSize: "0.8rem", color: "#39ff14" }}>
                    Wird hochgeladen...
                  </p>
                </div>
              ) : (
                <div className="flex flex-col items-center gap-4">
                  <div
                    className="w-16 h-16 rounded-full flex items-center justify-center"
                    style={{
                      background: "rgba(57,255,20,0.06)",
                      border: "1px solid rgba(57,255,20,0.2)",
                    }}
                  >
                    <Upload size={24} style={{ color: "#39ff14" }} />
                  </div>
                  <div>
                    <p
                      style={{ fontFamily: "var(--font-display)", fontSize: "1.1rem", fontWeight: 600, color: "#e4e4e7", marginBottom: "0.5rem" }}
                    >
                      PDF hierher ziehen
                    </p>
                    <p style={{ fontSize: "0.82rem", color: "#71717a" }}>
                      oder klicken zum Auswählen
                    </p>
                    <p
                      className="mt-2"
                      style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#3f3f46" }}
                    >
                      Max. 10 MB · PDF
                    </p>
                  </div>
                </div>
              )}
            </div>

            {/* Error */}
            {error && (
              <motion.div
                initial={{ opacity: 0, y: -10 }}
                animate={{ opacity: 1, y: 0 }}
                className="mt-4 flex items-center gap-2 px-4 py-3 rounded-lg"
                style={{ background: "rgba(239,68,68,0.1)", border: "1px solid rgba(239,68,68,0.3)" }}
              >
                <AlertCircle size={14} style={{ color: "#ef4444", flexShrink: 0 }} />
                <span style={{ fontSize: "0.8rem", color: "#ef4444" }}>{error}</span>
              </motion.div>
            )}

            {/* Uploaded file */}
            {uploaded && (
              <motion.div
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                className="mt-6 rounded-lg p-5"
                style={{ background: "#111115", border: "1px solid rgba(57,255,20,0.2)" }}
              >
                <div className="flex items-start gap-4">
                  <div
                    className="w-12 h-12 rounded flex items-center justify-center shrink-0"
                    style={{ background: "rgba(57,255,20,0.08)", border: "1px solid rgba(57,255,20,0.2)" }}
                  >
                    <FileText size={20} style={{ color: "#39ff14" }} />
                  </div>
                  <div className="flex-1 min-w-0">
                    <div className="flex items-center gap-2 mb-1">
                      <CheckCircle size={14} style={{ color: "#39ff14" }} />
                      <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14" }}>
                        Erfolgreich hochgeladen
                      </span>
                    </div>
                    <p
                      className="truncate mb-2"
                      style={{ fontFamily: "var(--font-display)", fontSize: "1rem", fontWeight: 600, color: "#e4e4e7" }}
                    >
                      {uploaded.name}
                    </p>
                    <div className="flex items-center gap-4">
                      <span className="flex items-center gap-1" style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#71717a" }}>
                        <HardDrive size={11} /> {formatSize(uploaded.size)}
                      </span>
                      <span className="flex items-center gap-1" style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#71717a" }}>
                        <Calendar size={11} /> {uploaded.uploadedAt.toLocaleDateString("de-DE")}
                      </span>
                    </div>
                  </div>
                </div>
                <div className="flex items-center gap-3 mt-4">
                  <a
                    href={uploaded.url}
                    target="_blank"
                    rel="noopener noreferrer"
                    className="flex items-center gap-2 px-4 py-2 rounded transition-all hover:scale-[1.01]"
                    style={{
                      background: "rgba(57,255,20,0.1)",
                      border: "1px solid rgba(57,255,20,0.3)",
                      color: "#39ff14",
                      fontFamily: "var(--font-mono)",
                      fontSize: "0.72rem",
                    }}
                  >
                    <Eye size={13} /> Vorschau
                  </a>
                  <a
                    href={uploaded.url}
                    download={uploaded.name}
                    className="flex items-center gap-2 px-4 py-2 rounded transition-all hover:scale-[1.01]"
                    style={{
                      background: "#39ff14",
                      color: "#050505",
                      fontFamily: "var(--font-mono)",
                      fontSize: "0.72rem",
                      fontWeight: 700,
                    }}
                  >
                    <Download size={13} /> Herunterladen
                  </a>
                  <button
                    onClick={() => { setUploaded(null); setError(null); }}
                    className="flex items-center gap-1 px-3 py-2 rounded transition-all ml-auto hover:text-[#ef4444]"
                    style={{
                      color: "#71717a",
                      border: "1px solid rgba(255,255,255,0.06)",
                      fontFamily: "var(--font-mono)",
                      fontSize: "0.7rem",
                    }}
                  >
                    <Trash2 size={12} /> Entfernen
                  </button>
                </div>
              </motion.div>
            )}
          </div>

          {/* Info panel */}
          <div className="lg:col-span-2">
            <div
              className="rounded-lg p-6 mb-6"
              style={{ background: "#111115", border: "1px solid rgba(57,255,20,0.1)" }}
            >
              <h3
                className="mb-4"
                style={{ fontFamily: "var(--font-display)", fontSize: "1.1rem", fontWeight: 600, color: "#e4e4e7" }}
              >
                Schnellübersicht
              </h3>
              {[
                { label: "Name", value: "Max Mustermann" },
                { label: "Beruf", value: "Fachinformatiker AE" },
                { label: "Erfahrung", value: "3+ Jahre" },
                { label: "Standort", value: "München, DE" },
                { label: "Verfügbar", value: "Ab sofort" },
                { label: "Arbeitsmodell", value: "Remote / Hybrid" },
              ].map(({ label, value }) => (
                <div
                  key={label}
                  className="flex justify-between py-2.5"
                  style={{ borderBottom: "1px solid rgba(57,255,20,0.06)" }}
                >
                  <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#71717a" }}>
                    {label}
                  </span>
                  <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#a1a1aa" }}>
                    {value}
                  </span>
                </div>
              ))}
            </div>

            <div
              className="rounded-lg p-6"
              style={{ background: "rgba(57,255,20,0.04)", border: "1px solid rgba(57,255,20,0.2)" }}
            >
              <h3
                className="mb-3"
                style={{ fontFamily: "var(--font-display)", fontSize: "1rem", fontWeight: 600, color: "#39ff14" }}
              >
                Hinweis
              </h3>
              <p style={{ fontSize: "0.8rem", color: "#71717a", lineHeight: 1.7 }}>
                Das hochgeladene PDF wird lokal in deinem Browser gespeichert.
                Für eine dauerhafte Speicherung und Besucher-Downloads empfehle
                ich die Anbindung an Supabase Storage oder ähnliche Cloud-Dienste.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
