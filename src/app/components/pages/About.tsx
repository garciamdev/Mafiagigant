import { motion } from "motion/react";
import {
  Cpu, Globe, Server, Database, Code2, Wrench, GraduationCap,
  Briefcase, Award, Coffee, Heart
} from "lucide-react";

const techCategories = [
  {
    icon: Code2, label: "Sprachen",
    items: [
      { name: "Python", level: 90 },
      { name: "TypeScript", level: 88 },
      { name: "JavaScript", level: 87 },
      { name: "Java", level: 78 },
      { name: "SQL", level: 82 },
      { name: "Bash / Shell", level: 70 },
    ],
  },
  {
    icon: Globe, label: "Frontend",
    items: [
      { name: "React", level: 85 },
      { name: "Next.js", level: 80 },
      { name: "Vue.js", level: 72 },
      { name: "Tailwind CSS", level: 88 },
      { name: "React Native", level: 65 },
      { name: "HTML / CSS", level: 92 },
    ],
  },
  {
    icon: Server, label: "Backend & APIs",
    items: [
      { name: "FastAPI / Django", level: 82 },
      { name: "Node.js / Express", level: 78 },
      { name: "Spring Boot", level: 70 },
      { name: "GraphQL", level: 72 },
      { name: "REST APIs", level: 90 },
      { name: "WebSockets", level: 65 },
    ],
  },
  {
    icon: Database, label: "Datenbanken & Infra",
    items: [
      { name: "PostgreSQL", level: 82 },
      { name: "Redis", level: 72 },
      { name: "MongoDB", level: 65 },
      { name: "Docker", level: 78 },
      { name: "Linux", level: 80 },
      { name: "Git / GitHub", level: 92 },
    ],
  },
];

const timeline = [
  {
    year: "2024 – heute",
    title: "Junior Fullstack Developer",
    place: "TechSolutions GmbH, München",
    desc: "Entwicklung von Webanwendungen mit React und FastAPI. Mitarbeit an Microservices-Migration und CI/CD-Pipeline-Aufbau.",
    icon: Briefcase,
    type: "work",
  },
  {
    year: "2023",
    title: "Abschluss: Fachinformatiker AE",
    place: "IHK München",
    desc: "Abschlussprüfung mit Auszeichnung bestanden. Abschlussprojekt: Webbasiertes Lagerverwaltungssystem.",
    icon: GraduationCap,
    type: "education",
  },
  {
    year: "2021 – 2023",
    title: "Ausbildung",
    place: "DataSystems AG, München",
    desc: "3-jährige duale Ausbildung zum Fachinformatiker für Anwendungsentwicklung. Entwicklung interner Tools, Datenbankoptimierung.",
    icon: Code2,
    type: "education",
  },
  {
    year: "2022",
    title: "AWS Cloud Practitioner",
    place: "Amazon Web Services",
    desc: "Zertifizierung in Cloud-Grundlagen, AWS-Services und Best Practices für Cloud-Architekturen.",
    icon: Award,
    type: "cert",
  },
  {
    year: "2021",
    title: "Hackathon 1. Platz",
    place: "HackMunich 2021",
    desc: "Gewinner des regionalen Hackathons mit einer KI-gestützten Sprachanalyse-App für Schüler.",
    icon: Award,
    type: "award",
  },
];

const softSkills = [
  "Agiles Arbeiten (Scrum / Kanban)",
  "Technische Dokumentation",
  "Code Reviews & Pair Programming",
  "Problemlösung & Debugging",
  "Teamkommunikation",
  "Eigenverantwortliches Arbeiten",
  "Präsentation & Pitching",
  "Mentoring von Azubis",
];

const typeColor: Record<string, string> = {
  work: "#39ff14",
  education: "#00d4ff",
  cert: "#a855f7",
  award: "#fbbf24",
};

export function About() {
  return (
    <div className="min-h-screen pt-16" style={{ background: "#09090b" }}>
      {/* Header */}
      <div style={{ borderBottom: "1px solid rgba(57,255,20,0.1)", background: "#0d0d10" }}>
        <div className="max-w-7xl mx-auto px-6 py-16 grid lg:grid-cols-2 gap-12 items-center">
          <div>
            <p
              className="mb-3"
              style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14", letterSpacing: "0.15em" }}
            >
              // ÜBER MICH
            </p>
            <h1
              className="mb-6"
              style={{ fontFamily: "var(--font-display)", fontSize: "clamp(2.2rem, 5vw, 3.5rem)", fontWeight: 700, color: "#e4e4e7" }}
            >
              Wer steckt dahinter?
            </h1>
            <p className="mb-4" style={{ color: "#a1a1aa", lineHeight: 1.8 }}>
              Ich bin Max Mustermann, Fachinformatiker für Anwendungsentwicklung aus München.
              Mit über 3 Jahren Erfahrung in der Softwareentwicklung bringe ich eine Leidenschaft
              für sauberen, wartbaren Code und moderne Technologien mit.
            </p>
            <p className="mb-4" style={{ color: "#a1a1aa", lineHeight: 1.8 }}>
              Mein Fokus liegt auf Full-Stack-Webentwicklung — von responsiven React-UIs bis zu
              skalierbaren Python-APIs. Ich liebe es, komplexe Probleme in elegante Lösungen zu übersetzen.
            </p>
            <div className="flex flex-wrap gap-4 mt-8">
              {[
                { label: "3+", sub: "Jahre Erfahrung" },
                { label: "25+", sub: "Projekte" },
                { label: "500+", sub: "GitHub Commits" },
              ].map(({ label, sub }) => (
                <div key={sub} className="text-center">
                  <div
                    style={{ fontFamily: "var(--font-display)", fontSize: "2rem", fontWeight: 700, color: "#39ff14" }}
                  >
                    {label}
                  </div>
                  <div style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#71717a" }}>{sub}</div>
                </div>
              ))}
            </div>
          </div>

          {/* Avatar / Info card */}
          <div className="flex justify-center lg:justify-end">
            <div
              className="rounded-2xl p-8 max-w-sm w-full"
              style={{ background: "#111115", border: "1px solid rgba(57,255,20,0.15)" }}
            >
              {/* Avatar placeholder */}
              <div
                className="w-28 h-28 rounded-full mx-auto mb-6 flex items-center justify-center"
                style={{
                  background: "linear-gradient(135deg, rgba(57,255,20,0.15), rgba(0,212,255,0.1))",
                  border: "2px solid rgba(57,255,20,0.3)",
                }}
              >
                <span
                  style={{ fontFamily: "var(--font-display)", fontSize: "2.5rem", fontWeight: 700, color: "#39ff14" }}
                >
                  MM
                </span>
              </div>
              <div className="text-center mb-6">
                <h2
                  style={{ fontFamily: "var(--font-display)", fontSize: "1.4rem", fontWeight: 700, color: "#e4e4e7" }}
                >
                  Max Mustermann
                </h2>
                <p style={{ fontFamily: "var(--font-mono)", fontSize: "0.72rem", color: "#39ff14", marginTop: "0.25rem" }}>
                  Fachinformatiker AE
                </p>
              </div>
              {[
                { label: "Standort", value: "München, Deutschland" },
                { label: "Verfügbar", value: "Ab sofort (Freelance)" },
                { label: "Sprachen", value: "Deutsch (Muttersprache), Englisch (B2)" },
              ].map(({ label, value }) => (
                <div
                  key={label}
                  className="flex justify-between py-2"
                  style={{ borderBottom: "1px solid rgba(57,255,20,0.07)" }}
                >
                  <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#71717a" }}>{label}</span>
                  <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: "#a1a1aa", textAlign: "right", maxWidth: "55%" }}>{value}</span>
                </div>
              ))}
              <div className="mt-4 flex items-center justify-center gap-2">
                <Heart size={12} style={{ color: "#39ff14" }} />
                <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.65rem", color: "#71717a" }}>
                  Kaffee & Dark Mode enthusiast
                </span>
                <Coffee size={12} style={{ color: "#71717a" }} />
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Skills */}
      <div className="max-w-7xl mx-auto px-6 py-20">
        <p
          className="mb-3"
          style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14", letterSpacing: "0.15em" }}
        >
          // TECHNOLOGIEN
        </p>
        <h2
          className="mb-12"
          style={{ fontFamily: "var(--font-display)", fontSize: "clamp(1.8rem, 4vw, 2.5rem)", fontWeight: 700, color: "#e4e4e7" }}
        >
          Tech Stack
        </h2>
        <div className="grid md:grid-cols-2 gap-8">
          {techCategories.map(({ icon: Icon, label, items }, ci) => (
            <motion.div
              key={label}
              initial={{ opacity: 0, y: 20 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.5, delay: ci * 0.1 }}
              className="rounded-lg p-6"
              style={{ background: "#111115", border: "1px solid rgba(57,255,20,0.1)" }}
            >
              <div className="flex items-center gap-2 mb-5">
                <Icon size={16} style={{ color: "#39ff14" }} />
                <span
                  style={{ fontFamily: "var(--font-mono)", fontSize: "0.75rem", color: "#e4e4e7", fontWeight: 600 }}
                >
                  {label}
                </span>
              </div>
              <div className="space-y-3">
                {items.map(({ name, level }) => (
                  <div key={name}>
                    <div className="flex justify-between mb-1">
                      <span style={{ fontSize: "0.8rem", color: "#a1a1aa" }}>{name}</span>
                      <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14" }}>
                        {level}%
                      </span>
                    </div>
                    <div
                      className="h-1 rounded-full overflow-hidden"
                      style={{ background: "rgba(57,255,20,0.06)" }}
                    >
                      <motion.div
                        initial={{ width: 0 }}
                        whileInView={{ width: `${level}%` }}
                        viewport={{ once: true }}
                        transition={{ duration: 0.9, ease: "easeOut" }}
                        className="h-full rounded-full"
                        style={{ background: "linear-gradient(90deg, #39ff14 0%, #00d4ff 100%)" }}
                      />
                    </div>
                  </div>
                ))}
              </div>
            </motion.div>
          ))}
        </div>
      </div>

      {/* Soft Skills */}
      <div style={{ borderTop: "1px solid rgba(57,255,20,0.1)", background: "#0d0d10" }}>
        <div className="max-w-7xl mx-auto px-6 py-16">
          <p
            className="mb-3"
            style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14", letterSpacing: "0.15em" }}
          >
            // SOFT SKILLS
          </p>
          <h2
            className="mb-10"
            style={{ fontFamily: "var(--font-display)", fontSize: "clamp(1.8rem, 4vw, 2.5rem)", fontWeight: 700, color: "#e4e4e7" }}
          >
            Arbeitsweise & Stärken
          </h2>
          <div className="flex flex-wrap gap-3">
            {softSkills.map((skill) => (
              <span
                key={skill}
                className="px-4 py-2 rounded"
                style={{
                  fontFamily: "var(--font-mono)",
                  fontSize: "0.75rem",
                  color: "#a1a1aa",
                  background: "#111115",
                  border: "1px solid rgba(57,255,20,0.12)",
                }}
              >
                {skill}
              </span>
            ))}
          </div>
        </div>
      </div>

      {/* Timeline */}
      <div className="max-w-7xl mx-auto px-6 py-20">
        <p
          className="mb-3"
          style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14", letterSpacing: "0.15em" }}
        >
          // WERDEGANG
        </p>
        <h2
          className="mb-12"
          style={{ fontFamily: "var(--font-display)", fontSize: "clamp(1.8rem, 4vw, 2.5rem)", fontWeight: 700, color: "#e4e4e7" }}
        >
          Timeline
        </h2>
        <div className="relative">
          {/* Timeline line */}
          <div
            className="absolute left-6 top-0 bottom-0 w-px"
            style={{ background: "rgba(57,255,20,0.12)" }}
          />
          <div className="space-y-8">
            {timeline.map((item, i) => (
              <motion.div
                key={i}
                initial={{ opacity: 0, x: -20 }}
                whileInView={{ opacity: 1, x: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.5, delay: i * 0.1 }}
                className="relative flex gap-6 pl-16"
              >
                {/* Dot */}
                <div
                  className="absolute left-0 w-12 h-12 rounded-full flex items-center justify-center"
                  style={{
                    background: "#0d0d10",
                    border: `2px solid ${typeColor[item.type]}`,
                    boxShadow: `0 0 12px ${typeColor[item.type]}30`,
                  }}
                >
                  <item.icon size={16} style={{ color: typeColor[item.type] }} />
                </div>

                <div
                  className="flex-1 rounded-lg p-5"
                  style={{ background: "#111115", border: "1px solid rgba(57,255,20,0.1)" }}
                >
                  <div className="flex flex-wrap items-start justify-between gap-2 mb-1">
                    <h3
                      style={{ fontFamily: "var(--font-display)", fontSize: "1.1rem", fontWeight: 600, color: "#e4e4e7" }}
                    >
                      {item.title}
                    </h3>
                    <span
                      style={{ fontFamily: "var(--font-mono)", fontSize: "0.68rem", color: typeColor[item.type] }}
                    >
                      {item.year}
                    </span>
                  </div>
                  <p
                    className="mb-2"
                    style={{ fontFamily: "var(--font-mono)", fontSize: "0.72rem", color: "#71717a" }}
                  >
                    {item.place}
                  </p>
                  <p style={{ fontSize: "0.82rem", color: "#a1a1aa", lineHeight: 1.65 }}>{item.desc}</p>
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </div>
    </div>
  );
}
