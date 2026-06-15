import { useState } from "react";
import { motion } from "motion/react";
import {
  Mail, Github, Linkedin, MapPin, Clock, Send,
  CheckCircle, AlertCircle, MessageSquare, Phone, Twitter
} from "lucide-react";

interface FormState {
  name: string;
  email: string;
  subject: string;
  budget: string;
  message: string;
}

const budgetOptions = [
  "< 1.000 €",
  "1.000 – 5.000 €",
  "5.000 – 15.000 €",
  "> 15.000 €",
  "Festanstellung",
  "Offen",
];

export function Contact() {
  const [form, setForm] = useState<FormState>({
    name: "", email: "", subject: "", budget: "", message: "",
  });
  const [status, setStatus] = useState<"idle" | "sending" | "success" | "error">("idle");

  function handleChange(field: keyof FormState, value: string) {
    setForm((f) => ({ ...f, [field]: value }));
  }

  function handleSubmit(e: React.FormEvent) {
    e.preventDefault();
    if (!form.name || !form.email || !form.message) return;
    setStatus("sending");
    // Simulate API call
    setTimeout(() => {
      setStatus("success");
      setForm({ name: "", email: "", subject: "", budget: "", message: "" });
    }, 2000);
  }

  const inputStyle = {
    background: "#1c1c21",
    border: "1px solid rgba(57,255,20,0.15)",
    color: "#e4e4e7",
    outline: "none",
    width: "100%",
    padding: "0.75rem 1rem",
    borderRadius: "6px",
    fontSize: "0.88rem",
    transition: "border-color 0.2s",
  };

  return (
    <div className="min-h-screen pt-16" style={{ background: "#09090b" }}>
      {/* Header */}
      <div style={{ borderBottom: "1px solid rgba(57,255,20,0.1)", background: "#0d0d10" }}>
        <div className="max-w-6xl mx-auto px-6 py-16">
          <p
            className="mb-3"
            style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14", letterSpacing: "0.15em" }}
          >
            // KONTAKT
          </p>
          <h1
            style={{ fontFamily: "var(--font-display)", fontSize: "clamp(2.2rem, 5vw, 3.5rem)", fontWeight: 700, color: "#e4e4e7" }}
          >
            Schreib mir
          </h1>
          <p className="mt-4 max-w-lg" style={{ color: "#71717a", lineHeight: 1.7 }}>
            Hast du ein Projekt, eine Idee oder eine Anfrage? Ich freue mich über jede Nachricht
            und antworte in der Regel innerhalb von 24 Stunden.
          </p>
        </div>
      </div>

      <div className="max-w-6xl mx-auto px-6 py-16 grid lg:grid-cols-5 gap-12">
        {/* Contact info */}
        <div className="lg:col-span-2 space-y-6">
          {/* Availability */}
          <div
            className="rounded-xl p-5"
            style={{ background: "#111115", border: "1px solid rgba(57,255,20,0.15)" }}
          >
            <div className="flex items-center gap-2 mb-4">
              <span
                className="w-2.5 h-2.5 rounded-full animate-pulse"
                style={{ background: "#39ff14", boxShadow: "0 0 8px #39ff14" }}
              />
              <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.72rem", color: "#39ff14" }}>
                Aktuell verfügbar
              </span>
            </div>
            <p style={{ fontSize: "0.83rem", color: "#71717a", lineHeight: 1.65 }}>
              Offen für Freelance-Projekte, Festanstellungen und spannende Kollaborationen.
              Antwortzeit: {"< 24h"}.
            </p>
          </div>

          {/* Contact links */}
          <div className="space-y-3">
            {[
              { icon: Mail, label: "E-Mail", value: "max@example.com", href: "mailto:max@example.com" },
              { icon: Github, label: "GitHub", value: "@maxmustermann", href: "#" },
              { icon: Linkedin, label: "LinkedIn", value: "Max Mustermann", href: "#" },
              { icon: Twitter, label: "X / Twitter", value: "@maxdev", href: "#" },
              { icon: MapPin, label: "Standort", value: "München, Deutschland", href: null },
              { icon: Clock, label: "Zeitzone", value: "UTC+1 (CET)", href: null },
            ].map(({ icon: Icon, label, value, href }) => (
              <div
                key={label}
                className="flex items-center gap-3 p-4 rounded-lg transition-all"
                style={{
                  background: "#111115",
                  border: "1px solid rgba(57,255,20,0.08)",
                }}
              >
                <div
                  className="w-9 h-9 rounded flex items-center justify-center shrink-0"
                  style={{ background: "rgba(57,255,20,0.06)", border: "1px solid rgba(57,255,20,0.15)" }}
                >
                  <Icon size={14} style={{ color: "#39ff14" }} />
                </div>
                <div className="min-w-0 flex-1">
                  <p style={{ fontFamily: "var(--font-mono)", fontSize: "0.65rem", color: "#71717a" }}>{label}</p>
                  {href ? (
                    <a
                      href={href}
                      className="truncate block transition-colors hover:text-[#39ff14]"
                      style={{ fontSize: "0.83rem", color: "#a1a1aa" }}
                    >
                      {value}
                    </a>
                  ) : (
                    <p className="truncate" style={{ fontSize: "0.83rem", color: "#a1a1aa" }}>{value}</p>
                  )}
                </div>
              </div>
            ))}
          </div>
        </div>

        {/* Form */}
        <div className="lg:col-span-3">
          {status === "success" ? (
            <motion.div
              initial={{ opacity: 0, scale: 0.96 }}
              animate={{ opacity: 1, scale: 1 }}
              className="rounded-xl p-10 text-center h-full flex flex-col items-center justify-center"
              style={{ background: "#111115", border: "1px solid rgba(57,255,20,0.25)" }}
            >
              <CheckCircle size={48} style={{ color: "#39ff14", marginBottom: "1.5rem" }} />
              <h3
                className="mb-3"
                style={{ fontFamily: "var(--font-display)", fontSize: "1.8rem", fontWeight: 700, color: "#e4e4e7" }}
              >
                Nachricht gesendet!
              </h3>
              <p style={{ color: "#71717a", lineHeight: 1.7, maxWidth: "360px" }}>
                Danke für deine Nachricht. Ich melde mich in der Regel innerhalb von 24 Stunden.
              </p>
              <button
                onClick={() => setStatus("idle")}
                className="mt-8 px-6 py-3 rounded"
                style={{
                  border: "1px solid rgba(57,255,20,0.3)",
                  color: "#39ff14",
                  fontFamily: "var(--font-mono)",
                  fontSize: "0.75rem",
                }}
              >
                Neue Nachricht
              </button>
            </motion.div>
          ) : (
            <div
              className="rounded-xl p-8"
              style={{ background: "#111115", border: "1px solid rgba(57,255,20,0.12)" }}
            >
              <h2
                className="mb-6"
                style={{ fontFamily: "var(--font-display)", fontSize: "1.5rem", fontWeight: 600, color: "#e4e4e7" }}
              >
                Kontaktformular
              </h2>
              <form onSubmit={handleSubmit} className="space-y-5">
                <div className="grid md:grid-cols-2 gap-5">
                  <div>
                    <label
                      style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#71717a", display: "block", marginBottom: "0.5rem" }}
                    >
                      Name *
                    </label>
                    <input
                      type="text"
                      value={form.name}
                      onChange={(e) => handleChange("name", e.target.value)}
                      placeholder="Dein Name"
                      required
                      style={inputStyle}
                      onFocus={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.4)")}
                      onBlur={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.15)")}
                    />
                  </div>
                  <div>
                    <label
                      style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#71717a", display: "block", marginBottom: "0.5rem" }}
                    >
                      E-Mail *
                    </label>
                    <input
                      type="email"
                      value={form.email}
                      onChange={(e) => handleChange("email", e.target.value)}
                      placeholder="deine@email.de"
                      required
                      style={inputStyle}
                      onFocus={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.4)")}
                      onBlur={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.15)")}
                    />
                  </div>
                </div>

                <div>
                  <label
                    style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#71717a", display: "block", marginBottom: "0.5rem" }}
                  >
                    Betreff
                  </label>
                  <input
                    type="text"
                    value={form.subject}
                    onChange={(e) => handleChange("subject", e.target.value)}
                    placeholder="Worum geht es?"
                    style={inputStyle}
                    onFocus={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.4)")}
                    onBlur={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.15)")}
                  />
                </div>

                <div>
                  <label
                    style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#71717a", display: "block", marginBottom: "0.5rem" }}
                  >
                    Budget / Rahmen
                  </label>
                  <div className="flex flex-wrap gap-2">
                    {budgetOptions.map((opt) => (
                      <button
                        key={opt}
                        type="button"
                        onClick={() => handleChange("budget", opt)}
                        className="px-3 py-1.5 rounded transition-all"
                        style={{
                          fontFamily: "var(--font-mono)",
                          fontSize: "0.68rem",
                          background: form.budget === opt ? "#39ff14" : "rgba(57,255,20,0.04)",
                          color: form.budget === opt ? "#050505" : "#71717a",
                          border: `1px solid ${form.budget === opt ? "#39ff14" : "rgba(57,255,20,0.12)"}`,
                          fontWeight: form.budget === opt ? 700 : 400,
                        }}
                      >
                        {opt}
                      </button>
                    ))}
                  </div>
                </div>

                <div>
                  <label
                    style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#71717a", display: "block", marginBottom: "0.5rem" }}
                  >
                    Nachricht *
                  </label>
                  <textarea
                    value={form.message}
                    onChange={(e) => handleChange("message", e.target.value)}
                    placeholder="Beschreibe dein Projekt, deine Anfrage oder was auch immer auf dem Herzen liegt..."
                    rows={6}
                    required
                    className="resize-none"
                    style={{ ...inputStyle, lineHeight: 1.65 }}
                    onFocus={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.4)")}
                    onBlur={(e) => (e.target.style.borderColor = "rgba(57,255,20,0.15)")}
                  />
                </div>

                <button
                  type="submit"
                  disabled={status === "sending"}
                  className="flex items-center gap-2 px-8 py-3.5 rounded w-full justify-center transition-all duration-200 hover:scale-[1.01] disabled:opacity-60 disabled:cursor-not-allowed"
                  style={{
                    background: "#39ff14",
                    color: "#050505",
                    fontFamily: "var(--font-mono)",
                    fontSize: "0.82rem",
                    fontWeight: 700,
                    letterSpacing: "0.05em",
                    boxShadow: "0 0 24px rgba(57,255,20,0.2)",
                  }}
                >
                  {status === "sending" ? (
                    <>
                      <div
                        className="w-4 h-4 rounded-full border-2 border-t-transparent animate-spin"
                        style={{ borderColor: "#050505", borderTopColor: "transparent" }}
                      />
                      Wird gesendet...
                    </>
                  ) : (
                    <>
                      <Send size={15} /> Nachricht senden
                    </>
                  )}
                </button>
              </form>
            </div>
          )}
        </div>
      </div>
    </div>
  );
}
