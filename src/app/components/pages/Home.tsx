import { useEffect, useState, useRef } from "react";
import { Link } from "react-router";
import { motion } from "motion/react";
import {
  ArrowRight, Code2, Cpu, Globe, Github, Linkedin, Mail,
  ChevronDown, ExternalLink, Star, GitFork
} from "lucide-react";
import { NewsTicker } from "../NewsTicker";

const newsItems = [
  "🚀 Neues Projekt gestartet: KI-gestützte Webanwendung",
  "✅ React Native App v2.0 erfolgreich deployed",
  "📚 Zertifizierung in AWS Cloud Practitioner bestanden",
  "🎯 Open Source Contribution bei GitHub: 500+ Commits erreicht",
  "💼 Offen für neue Projekte & Freelance-Anfragen",
  "🏆 Gewinner des regionalen Hackathons 2024",
];

const featuredProjects = [
  {
    id: 1,
    title: "ShopFlow CRM",
    desc: "Vollständige CRM-Lösung für E-Commerce mit Echtzeit-Analytics, Kundenverwaltung und automatisierten Workflows.",
    tech: ["React", "Node.js", "PostgreSQL", "Redis"],
    stars: 124,
    forks: 38,
    status: "Live",
  },
  {
    id: 2,
    title: "DevOps Dashboard",
    desc: "Monitoring-Dashboard für CI/CD-Pipelines mit Metriken, Alerts und Team-Kollaboration.",
    tech: ["Vue.js", "Python", "Docker", "Grafana"],
    stars: 89,
    forks: 21,
    status: "Open Source",
  },
  {
    id: 3,
    title: "TaskMaster API",
    desc: "RESTful API mit GraphQL-Endpunkten für aufgabenbasiertes Projektmanagement.",
    tech: ["FastAPI", "GraphQL", "SQLAlchemy", "JWT"],
    stars: 67,
    forks: 15,
    status: "Stable",
  },
];

const skills = [
  { name: "Python", level: 90 },
  { name: "JavaScript / TypeScript", level: 88 },
  { name: "React / Next.js", level: 85 },
  { name: "Java", level: 78 },
  { name: "SQL / PostgreSQL", level: 82 },
  { name: "Docker / Linux", level: 75 },
];

function useTypewriter(text: string, speed = 60) {
  const [displayed, setDisplayed] = useState("");
  useEffect(() => {
    let i = 0;
    setDisplayed("");
    const interval = setInterval(() => {
      if (i < text.length) {
        setDisplayed(text.slice(0, i + 1));
        i++;
      } else {
        clearInterval(interval);
      }
    }, speed);
    return () => clearInterval(interval);
  }, [text, speed]);
  return displayed;
}

export function Home() {
  const typed = useTypewriter("Fachinformatiker für Anwendungsentwicklung", 55);
  const [cursorVisible, setCursorVisible] = useState(true);

  useEffect(() => {
    const blink = setInterval(() => setCursorVisible((v) => !v), 530);
    return () => clearInterval(blink);
  }, []);

  return (
    <div className="min-h-screen" style={{ background: "#09090b" }}>
      {/* News ticker */}
      <div className="pt-16">
        <NewsTicker items={newsItems} />
      </div>

      {/* Hero */}
      <section className="relative min-h-[90vh] flex items-center overflow-hidden">
        {/* Grid background */}
        <div
          className="absolute inset-0 pointer-events-none"
          style={{
            backgroundImage: `
              linear-gradient(rgba(57,255,20,0.03) 1px, transparent 1px),
              linear-gradient(90deg, rgba(57,255,20,0.03) 1px, transparent 1px)
            `,
            backgroundSize: "60px 60px",
          }}
        />
        {/* Glow orb */}
        <div
          className="absolute pointer-events-none"
          style={{
            width: "600px",
            height: "600px",
            borderRadius: "50%",
            background: "radial-gradient(circle, rgba(57,255,20,0.06) 0%, transparent 70%)",
            top: "50%",
            left: "50%",
            transform: "translate(-50%, -50%)",
          }}
        />

        <div className="max-w-7xl mx-auto px-6 py-20 relative z-10 grid lg:grid-cols-2 gap-16 items-center">
          <div>
            {/* Status badge */}
            <motion.div
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.5 }}
              className="inline-flex items-center gap-2 px-3 py-1.5 rounded-full mb-8"
              style={{
                border: "1px solid rgba(57,255,20,0.3)",
                background: "rgba(57,255,20,0.06)",
              }}
            >
              <span
                className="w-2 h-2 rounded-full animate-pulse"
                style={{ background: "#39ff14", boxShadow: "0 0 6px #39ff14" }}
              />
              <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14" }}>
                Aktiv & verfügbar
              </span>
            </motion.div>

            <motion.h1
              initial={{ opacity: 0, y: 30 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.6, delay: 0.1 }}
              style={{
                fontFamily: "var(--font-display)",
                fontSize: "clamp(2.5rem, 6vw, 4.5rem)",
                fontWeight: 700,
                lineHeight: 1.05,
                color: "#e4e4e7",
                letterSpacing: "-0.02em",
                marginBottom: "1rem",
              }}
            >
              Max Mustermann
            </motion.h1>

            <motion.div
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.6, delay: 0.2 }}
              className="mb-8"
              style={{ minHeight: "2.5rem" }}
            >
              <span
                style={{
                  fontFamily: "var(--font-mono)",
                  fontSize: "clamp(0.85rem, 2vw, 1rem)",
                  color: "#39ff14",
                }}
              >
                $ {typed}
                <span style={{ opacity: cursorVisible ? 1 : 0, color: "#39ff14" }}>▌</span>
              </span>
            </motion.div>

            <motion.p
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.6, delay: 0.3 }}
              className="mb-10"
              style={{
                color: "#71717a",
                fontSize: "1.05rem",
                lineHeight: 1.7,
                maxWidth: "520px",
              }}
            >
              Ich entwickle skalierbare Webanwendungen, APIs und Automatisierungslösungen.
              Leidenschaft für sauberen Code, moderne Architekturen und spannende Herausforderungen.
            </motion.p>

            <motion.div
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ duration: 0.6, delay: 0.4 }}
              className="flex flex-wrap gap-4 mb-10"
            >
              <Link
                to="/projects"
                className="inline-flex items-center gap-2 px-6 py-3 rounded transition-all duration-200 hover:scale-[1.02]"
                style={{
                  background: "#39ff14",
                  color: "#050505",
                  fontFamily: "var(--font-mono)",
                  fontSize: "0.8rem",
                  fontWeight: 700,
                  letterSpacing: "0.05em",
                  boxShadow: "0 0 20px rgba(57,255,20,0.3)",
                }}
              >
                Meine Projekte <ArrowRight size={14} />
              </Link>
              <Link
                to="/contact"
                className="inline-flex items-center gap-2 px-6 py-3 rounded transition-all duration-200 hover:border-[rgba(57,255,20,0.5)] hover:text-[#e4e4e7]"
                style={{
                  border: "1px solid rgba(57,255,20,0.2)",
                  color: "#71717a",
                  fontFamily: "var(--font-mono)",
                  fontSize: "0.8rem",
                  fontWeight: 600,
                  letterSpacing: "0.05em",
                }}
              >
                Kontakt
              </Link>
            </motion.div>

            {/* Social links */}
            <motion.div
              initial={{ opacity: 0 }}
              animate={{ opacity: 1 }}
              transition={{ duration: 0.6, delay: 0.5 }}
              className="flex items-center gap-4"
            >
              {[
                { icon: Github, href: "#", label: "GitHub" },
                { icon: Linkedin, href: "#", label: "LinkedIn" },
                { icon: Mail, href: "mailto:max@example.com", label: "E-Mail" },
              ].map(({ icon: Icon, href, label }) => (
                <a
                  key={label}
                  href={href}
                  className="p-2.5 rounded transition-all duration-200 hover:border-[rgba(57,255,20,0.4)] hover:text-[#39ff14]"
                  style={{
                    border: "1px solid rgba(57,255,20,0.12)",
                    color: "#71717a",
                    background: "rgba(57,255,20,0.02)",
                  }}
                  title={label}
                >
                  <Icon size={16} />
                </a>
              ))}
            </motion.div>
          </div>

          {/* Terminal card */}
          <motion.div
            initial={{ opacity: 0, x: 40 }}
            animate={{ opacity: 1, x: 0 }}
            transition={{ duration: 0.7, delay: 0.3 }}
            className="rounded-lg overflow-hidden"
            style={{
              border: "1px solid rgba(57,255,20,0.15)",
              background: "#0d0d10",
              boxShadow: "0 0 60px rgba(57,255,20,0.06)",
            }}
          >
            {/* Terminal title bar */}
            <div
              className="flex items-center gap-2 px-4 py-3"
              style={{ borderBottom: "1px solid rgba(57,255,20,0.1)", background: "#111115" }}
            >
              <span className="w-3 h-3 rounded-full" style={{ background: "#ef4444" }} />
              <span className="w-3 h-3 rounded-full" style={{ background: "#fbbf24" }} />
              <span className="w-3 h-3 rounded-full" style={{ background: "#39ff14" }} />
              <span
                className="ml-4"
                style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#71717a" }}
              >
                portfolio.sh
              </span>
            </div>
            <div className="p-6" style={{ fontFamily: "var(--font-mono)", fontSize: "0.8rem" }}>
              {[
                { prompt: "$", cmd: "whoami", out: "max-mustermann" },
                { prompt: "$", cmd: "cat skills.json | jq '.top'", out: null },
              ].map((line, i) => (
                <div key={i} className="mb-1">
                  <span style={{ color: "#39ff14" }}>{line.prompt} </span>
                  <span style={{ color: "#e4e4e7" }}>{line.cmd}</span>
                  {line.out && (
                    <div style={{ color: "#71717a", paddingLeft: "1rem" }}>{line.out}</div>
                  )}
                </div>
              ))}
              <div className="mt-2 mb-4 pl-4">
                <pre style={{ color: "#71717a", fontSize: "0.75rem", lineHeight: 1.6 }}>
{`{
  "languages": ["Python", "JS/TS", "Java"],
  "frameworks": ["React", "FastAPI", "Spring"],
  "tools":      ["Docker", "Git", "Linux"],
  "experience": "3+ Jahre"
}`}
                </pre>
              </div>
              <div>
                <span style={{ color: "#39ff14" }}>$ </span>
                <span style={{ color: "#e4e4e7" }}>./start_portfolio.sh</span>
              </div>
              <div style={{ color: "#39ff14", marginTop: "0.25rem" }}>
                ✓ Portfolio geladen. Viel Spaß beim Erkunden!
              </div>
              <div className="mt-2 flex items-center">
                <span style={{ color: "#39ff14" }}>$ </span>
                <span
                  className="ml-1 w-2 h-4 animate-pulse"
                  style={{ background: "#39ff14", display: "inline-block" }}
                />
              </div>
            </div>
          </motion.div>
        </div>

        {/* Scroll hint */}
        <div className="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 animate-bounce">
          <ChevronDown size={20} style={{ color: "rgba(57,255,20,0.4)" }} />
        </div>
      </section>

      {/* Featured Projects */}
      <section className="max-w-7xl mx-auto px-6 py-20">
        <div className="flex items-center justify-between mb-12">
          <div>
            <p
              className="mb-2"
              style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14", letterSpacing: "0.15em" }}
            >
              // FEATURED
            </p>
            <h2
              style={{ fontFamily: "var(--font-display)", fontSize: "clamp(1.8rem, 4vw, 2.8rem)", fontWeight: 700, color: "#e4e4e7" }}
            >
              Ausgewählte Projekte
            </h2>
          </div>
          <Link
            to="/projects"
            className="hidden md:inline-flex items-center gap-2 transition-colors hover:text-[#e4e4e7]"
            style={{ fontFamily: "var(--font-mono)", fontSize: "0.75rem", color: "#71717a", letterSpacing: "0.05em" }}
          >
            Alle anzeigen <ArrowRight size={14} />
          </Link>
        </div>

        <div className="grid md:grid-cols-3 gap-6">
          {featuredProjects.map((project, i) => (
            <motion.div
              key={project.id}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.5, delay: i * 0.1 }}
              className="group rounded-lg p-6 transition-all duration-300 hover:border-[rgba(57,255,20,0.3)] cursor-pointer"
              style={{
                background: "#111115",
                border: "1px solid rgba(57,255,20,0.12)",
              }}
            >
              <div className="flex items-start justify-between mb-4">
                <div
                  className="w-10 h-10 rounded flex items-center justify-center"
                  style={{ background: "rgba(57,255,20,0.08)", border: "1px solid rgba(57,255,20,0.2)" }}
                >
                  <Code2 size={18} style={{ color: "#39ff14" }} />
                </div>
                <span
                  className="px-2 py-1 rounded text-xs"
                  style={{
                    fontFamily: "var(--font-mono)",
                    fontSize: "0.6rem",
                    background: "rgba(57,255,20,0.1)",
                    color: "#39ff14",
                    border: "1px solid rgba(57,255,20,0.2)",
                  }}
                >
                  {project.status}
                </span>
              </div>
              <h3
                className="mb-2"
                style={{ fontFamily: "var(--font-display)", fontSize: "1.2rem", fontWeight: 600, color: "#e4e4e7" }}
              >
                {project.title}
              </h3>
              <p style={{ fontSize: "0.85rem", color: "#71717a", lineHeight: 1.6, marginBottom: "1rem" }}>
                {project.desc}
              </p>
              <div className="flex flex-wrap gap-1.5 mb-4">
                {project.tech.map((t) => (
                  <span
                    key={t}
                    className="px-2 py-0.5 rounded"
                    style={{
                      fontFamily: "var(--font-mono)",
                      fontSize: "0.6rem",
                      background: "#1c1c21",
                      color: "#a1a1aa",
                      border: "1px solid rgba(255,255,255,0.06)",
                    }}
                  >
                    {t}
                  </span>
                ))}
              </div>
              <div className="flex items-center gap-4">
                <span className="flex items-center gap-1" style={{ fontSize: "0.75rem", color: "#71717a" }}>
                  <Star size={12} /> {project.stars}
                </span>
                <span className="flex items-center gap-1" style={{ fontSize: "0.75rem", color: "#71717a" }}>
                  <GitFork size={12} /> {project.forks}
                </span>
                <span
                  className="ml-auto flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity"
                  style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14" }}
                >
                  Details <ExternalLink size={11} />
                </span>
              </div>
            </motion.div>
          ))}
        </div>
      </section>

      {/* Skills overview */}
      <section
        className="border-y"
        style={{ borderColor: "rgba(57,255,20,0.1)", background: "#0d0d10" }}
      >
        <div className="max-w-7xl mx-auto px-6 py-20">
          <p
            className="mb-2"
            style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14", letterSpacing: "0.15em" }}
          >
            // TECHNOLOGIEN
          </p>
          <h2
            className="mb-12"
            style={{ fontFamily: "var(--font-display)", fontSize: "clamp(1.8rem, 4vw, 2.8rem)", fontWeight: 700, color: "#e4e4e7" }}
          >
            Stack & Skills
          </h2>
          <div className="grid md:grid-cols-2 gap-6">
            {skills.map((skill, i) => (
              <motion.div
                key={skill.name}
                initial={{ opacity: 0, x: -20 }}
                whileInView={{ opacity: 1, x: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.5, delay: i * 0.08 }}
              >
                <div className="flex justify-between mb-2">
                  <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.8rem", color: "#e4e4e7" }}>
                    {skill.name}
                  </span>
                  <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.75rem", color: "#39ff14" }}>
                    {skill.level}%
                  </span>
                </div>
                <div
                  className="h-1.5 rounded-full overflow-hidden"
                  style={{ background: "rgba(57,255,20,0.08)" }}
                >
                  <motion.div
                    initial={{ width: 0 }}
                    whileInView={{ width: `${skill.level}%` }}
                    viewport={{ once: true }}
                    transition={{ duration: 1, delay: i * 0.1, ease: "easeOut" }}
                    className="h-full rounded-full"
                    style={{ background: "linear-gradient(90deg, #39ff14, #00d4ff)" }}
                  />
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="max-w-7xl mx-auto px-6 py-24 text-center">
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          className="max-w-2xl mx-auto"
        >
          <p
            className="mb-4"
            style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14", letterSpacing: "0.15em" }}
          >
            // BEREIT FÜR ZUSAMMENARBEIT
          </p>
          <h2
            className="mb-6"
            style={{ fontFamily: "var(--font-display)", fontSize: "clamp(2rem, 5vw, 3.5rem)", fontWeight: 700, color: "#e4e4e7" }}
          >
            Lass uns etwas Großes bauen
          </h2>
          <p className="mb-10" style={{ color: "#71717a", lineHeight: 1.7 }}>
            Ob Startup-MVP, Unternehmensanwendung oder Open-Source-Projekt —
            ich bringe die Erfahrung und Leidenschaft mit, die dein Projekt braucht.
          </p>
          <Link
            to="/contact"
            className="inline-flex items-center gap-2 px-8 py-4 rounded transition-all hover:scale-[1.02]"
            style={{
              background: "#39ff14",
              color: "#050505",
              fontFamily: "var(--font-mono)",
              fontSize: "0.85rem",
              fontWeight: 700,
              letterSpacing: "0.05em",
              boxShadow: "0 0 30px rgba(57,255,20,0.25)",
            }}
          >
            Jetzt Kontakt aufnehmen <ArrowRight size={16} />
          </Link>
        </motion.div>
      </section>
    </div>
  );
}
