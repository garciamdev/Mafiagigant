import { useState } from "react";
import { motion, AnimatePresence } from "motion/react";
import {
  Code2, ExternalLink, Github, Star, GitFork, Filter,
  Globe, Smartphone, Server, Database, Layers
} from "lucide-react";

type Category = "all" | "web" | "api" | "mobile" | "tools";

const categories: { key: Category; label: string; icon: any }[] = [
  { key: "all", label: "Alle", icon: Layers },
  { key: "web", label: "Web Apps", icon: Globe },
  { key: "api", label: "APIs & Backend", icon: Server },
  { key: "mobile", label: "Mobile", icon: Smartphone },
  { key: "tools", label: "Tools & Scripts", icon: Database },
];

const projects = [
  {
    id: 1, title: "ShopFlow CRM", category: "web" as Category,
    desc: "Vollständige CRM-Lösung für E-Commerce mit Echtzeit-Analytics, Kundenverwaltung, automatisierten E-Mail-Workflows und Reporting-Dashboard.",
    tech: ["React", "Node.js", "PostgreSQL", "Redis", "Socket.io"], stars: 124, forks: 38,
    status: "Live", year: "2024",
    github: "#", demo: "#",
    highlights: ["Echtzeit-Dashboard", "500+ aktive Nutzer", "99.9% Uptime"],
  },
  {
    id: 2, title: "DevOps Dashboard", category: "tools" as Category,
    desc: "Zentrales Monitoring-Dashboard für CI/CD-Pipelines. Visualisiert Build-Metriken, Deploy-Status und Team-Performance in Echtzeit.",
    tech: ["Vue.js", "Python", "Docker", "Prometheus", "Grafana"], stars: 89, forks: 21,
    status: "Open Source", year: "2024",
    github: "#", demo: "#",
    highlights: ["30+ Integrationen", "Docker Compose", "Alerting"],
  },
  {
    id: 3, title: "TaskMaster API", category: "api" as Category,
    desc: "RESTful API mit GraphQL-Endpunkten für aufgabenbasiertes Projektmanagement. Inkl. JWT Auth, Rate Limiting und Swagger-Doku.",
    tech: ["FastAPI", "GraphQL", "SQLAlchemy", "JWT", "Alembic"], stars: 67, forks: 15,
    status: "Stable", year: "2023",
    github: "#", demo: null,
    highlights: ["GraphQL + REST", "OAuth2 Support", "Auto-Doku"],
  },
  {
    id: 4, title: "BudgetTrack Mobile", category: "mobile" as Category,
    desc: "Cross-platform Budgetverwaltungs-App mit Banksynchronisation, Kategorisierung und intelligenten Ausgabenanalysen.",
    tech: ["React Native", "Expo", "Zustand", "Plaid API"], stars: 45, forks: 9,
    status: "Beta", year: "2024",
    github: "#", demo: "#",
    highlights: ["iOS & Android", "Offline-Sync", "Biometrics"],
  },
  {
    id: 5, title: "Inventory Manager", category: "web" as Category,
    desc: "Lagerverwaltungssystem für KMU mit QR-Code-Scanner, Lieferantenverwaltung und automatischen Nachbestellungen.",
    tech: ["Next.js", "Prisma", "tRPC", "QR-Code", "Tailwind"], stars: 33, forks: 7,
    status: "Live", year: "2023",
    github: "#", demo: "#",
    highlights: ["QR-Code Scan", "Email-Alerts", "Export CSV/PDF"],
  },
  {
    id: 6, title: "CLI Dev Tools", category: "tools" as Category,
    desc: "Sammlung nützlicher CLI-Tools für Entwickler: Git-Workflow-Automation, Projekt-Scaffolding, Log-Analyzer und Deploy-Scripts.",
    tech: ["Python", "Click", "Rich", "PyYAML", "Bash"], stars: 211, forks: 52,
    status: "Open Source", year: "2023",
    github: "#", demo: null,
    highlights: ["200+ wöchentliche Downloads", "Plugin-System", "Cross-platform"],
  },
  {
    id: 7, title: "Auth Microservice", category: "api" as Category,
    desc: "Standalone Authentifizierungs-Microservice mit SSO, MFA, Session-Management und Admin-Panel.",
    tech: ["Spring Boot", "Java", "PostgreSQL", "Redis", "TOTP"], stars: 58, forks: 12,
    status: "Stable", year: "2022",
    github: "#", demo: null,
    highlights: ["SSO / SAML", "MFA Support", "Docker-ready"],
  },
  {
    id: 8, title: "Portfolio v1", category: "web" as Category,
    desc: "Meine erste Portfolio-Website — statisch, schnell, mit animierter Timeline und Dark Mode.",
    tech: ["Astro", "Tailwind CSS", "TypeScript", "Framer Motion"], stars: 18, forks: 4,
    status: "Archiv", year: "2022",
    github: "#", demo: "#",
    highlights: ["Lighthouse 100", "SSG", "Multilingal"],
  },
];

const statusColor: Record<string, string> = {
  Live: "#39ff14",
  "Open Source": "#00d4ff",
  Stable: "#a855f7",
  Beta: "#fbbf24",
  Archiv: "#71717a",
};

export function Projects() {
  const [active, setActive] = useState<Category>("all");
  const filtered = active === "all" ? projects : projects.filter((p) => p.category === active);

  return (
    <div className="min-h-screen pt-16" style={{ background: "#09090b" }}>
      {/* Header */}
      <div
        className="border-b"
        style={{ borderColor: "rgba(57,255,20,0.1)", background: "#0d0d10" }}
      >
        <div className="max-w-7xl mx-auto px-6 py-16">
          <p
            className="mb-3"
            style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#39ff14", letterSpacing: "0.15em" }}
          >
            // PROJEKTE
          </p>
          <h1
            style={{ fontFamily: "var(--font-display)", fontSize: "clamp(2.2rem, 5vw, 3.5rem)", fontWeight: 700, color: "#e4e4e7" }}
          >
            Was ich gebaut habe
          </h1>
          <p className="mt-4 max-w-xl" style={{ color: "#71717a", lineHeight: 1.7 }}>
            Eine Auswahl meiner Projekte — von kleinen Scripts bis zu produktionsreifen Webanwendungen.
            Offen für Kollaborationen und neue Ideen.
          </p>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-6 py-12">
        {/* Filter */}
        <div className="flex flex-wrap gap-2 mb-12 items-center">
          <Filter size={14} style={{ color: "#71717a" }} />
          {categories.map(({ key, label, icon: Icon }) => (
            <button
              key={key}
              onClick={() => setActive(key)}
              className="flex items-center gap-1.5 px-4 py-2 rounded transition-all duration-200"
              style={{
                fontFamily: "var(--font-mono)",
                fontSize: "0.72rem",
                fontWeight: active === key ? 700 : 400,
                background: active === key ? "#39ff14" : "rgba(57,255,20,0.04)",
                color: active === key ? "#050505" : "#71717a",
                border: `1px solid ${active === key ? "#39ff14" : "rgba(57,255,20,0.12)"}`,
              }}
            >
              <Icon size={12} /> {label}
            </button>
          ))}
        </div>

        {/* Grid */}
        <div className="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
          <AnimatePresence mode="popLayout">
            {filtered.map((project, i) => (
              <motion.div
                key={project.id}
                layout
                initial={{ opacity: 0, scale: 0.96 }}
                animate={{ opacity: 1, scale: 1 }}
                exit={{ opacity: 0, scale: 0.94 }}
                transition={{ duration: 0.3, delay: i * 0.05 }}
                className="group flex flex-col rounded-lg p-6 transition-all duration-300 hover:border-[rgba(57,255,20,0.3)]"
                style={{ background: "#111115", border: "1px solid rgba(57,255,20,0.12)" }}
              >
                <div className="flex items-start justify-between mb-4">
                  <Code2 size={20} style={{ color: "#39ff14", opacity: 0.7 }} />
                  <div className="flex items-center gap-2">
                    <span
                      className="px-2 py-0.5 rounded-full text-xs"
                      style={{
                        fontFamily: "var(--font-mono)",
                        fontSize: "0.6rem",
                        color: statusColor[project.status] || "#71717a",
                        background: `${statusColor[project.status]}18` || "rgba(255,255,255,0.05)",
                        border: `1px solid ${statusColor[project.status]}30` || "1px solid rgba(255,255,255,0.08)",
                      }}
                    >
                      {project.status}
                    </span>
                    <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.6rem", color: "#3f3f46" }}>
                      {project.year}
                    </span>
                  </div>
                </div>

                <h3
                  className="mb-2"
                  style={{ fontFamily: "var(--font-display)", fontSize: "1.25rem", fontWeight: 600, color: "#e4e4e7" }}
                >
                  {project.title}
                </h3>
                <p className="flex-1 mb-4" style={{ fontSize: "0.82rem", color: "#71717a", lineHeight: 1.65 }}>
                  {project.desc}
                </p>

                {/* Highlights */}
                <div className="flex flex-wrap gap-1.5 mb-4">
                  {project.highlights.map((h) => (
                    <span
                      key={h}
                      className="px-2 py-0.5 rounded"
                      style={{
                        fontFamily: "var(--font-mono)",
                        fontSize: "0.58rem",
                        color: "#39ff14",
                        background: "rgba(57,255,20,0.06)",
                        border: "1px solid rgba(57,255,20,0.15)",
                      }}
                    >
                      ✓ {h}
                    </span>
                  ))}
                </div>

                {/* Tech stack */}
                <div className="flex flex-wrap gap-1 mb-5">
                  {project.tech.map((t) => (
                    <span
                      key={t}
                      className="px-2 py-0.5 rounded"
                      style={{
                        fontFamily: "var(--font-mono)",
                        fontSize: "0.6rem",
                        background: "#1c1c21",
                        color: "#a1a1aa",
                        border: "1px solid rgba(255,255,255,0.05)",
                      }}
                    >
                      {t}
                    </span>
                  ))}
                </div>

                {/* Footer */}
                <div
                  className="flex items-center justify-between pt-4"
                  style={{ borderTop: "1px solid rgba(57,255,20,0.08)" }}
                >
                  <div className="flex items-center gap-3">
                    <span className="flex items-center gap-1" style={{ fontSize: "0.73rem", color: "#71717a" }}>
                      <Star size={11} /> {project.stars}
                    </span>
                    <span className="flex items-center gap-1" style={{ fontSize: "0.73rem", color: "#71717a" }}>
                      <GitFork size={11} /> {project.forks}
                    </span>
                  </div>
                  <div className="flex items-center gap-2">
                    <a
                      href={project.github}
                      className="p-1.5 rounded transition-all hover:text-[#39ff14]"
                      style={{ color: "#71717a", border: "1px solid rgba(57,255,20,0.1)" }}
                      title="GitHub"
                    >
                      <Github size={13} />
                    </a>
                    {project.demo && (
                      <a
                        href={project.demo}
                        className="p-1.5 rounded transition-all hover:text-[#39ff14]"
                        style={{ color: "#71717a", border: "1px solid rgba(57,255,20,0.1)" }}
                        title="Live Demo"
                      >
                        <ExternalLink size={13} />
                      </a>
                    )}
                  </div>
                </div>
              </motion.div>
            ))}
          </AnimatePresence>
        </div>

        {filtered.length === 0 && (
          <div className="text-center py-24" style={{ color: "#71717a", fontFamily: "var(--font-mono)" }}>
            Keine Projekte in dieser Kategorie.
          </div>
        )}
      </div>
    </div>
  );
}
