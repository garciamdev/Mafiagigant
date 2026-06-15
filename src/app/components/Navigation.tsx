import { useState, useEffect } from "react";
import { NavLink, useLocation } from "react-router";
import { Menu, X, Terminal, Code2 } from "lucide-react";
import { motion, AnimatePresence } from "motion/react";

const navItems = [
  { path: "/", label: "Home" },
  { path: "/projects", label: "Projekte" },
  { path: "/about", label: "Über mich" },
  { path: "/cv", label: "Lebenslauf" },
  { path: "/news", label: "News" },
  { path: "/contact", label: "Kontakt" },
];

export function Navigation() {
  const [menuOpen, setMenuOpen] = useState(false);
  const [scrolled, setScrolled] = useState(false);
  const location = useLocation();

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 20);
    window.addEventListener("scroll", onScroll);
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  useEffect(() => setMenuOpen(false), [location]);

  return (
    <header
      className="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
      style={{
        background: scrolled
          ? "rgba(9,9,11,0.92)"
          : "rgba(9,9,11,0.6)",
        backdropFilter: "blur(16px)",
        borderBottom: scrolled ? "1px solid rgba(57,255,20,0.15)" : "1px solid transparent",
      }}
    >
      <div className="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        {/* Logo */}
        <NavLink to="/" className="flex items-center gap-2 group">
          <div
            className="w-8 h-8 flex items-center justify-center rounded"
            style={{ background: "rgba(57,255,20,0.12)", border: "1px solid rgba(57,255,20,0.3)" }}
          >
            <Terminal size={16} style={{ color: "#39ff14" }} />
          </div>
          <span
            className="tracking-widest uppercase"
            style={{ fontFamily: "var(--font-display)", color: "#39ff14", fontSize: "1.1rem", fontWeight: 700 }}
          >
            dev<span style={{ color: "#e4e4e7" }}>folio</span>
          </span>
        </NavLink>

        {/* Desktop nav */}
        <nav className="hidden md:flex items-center gap-1">
          {navItems.map((item) => (
            <NavLink
              key={item.path}
              to={item.path}
              end={item.path === "/"}
              className={({ isActive }) =>
                `px-4 py-2 rounded text-sm tracking-wider uppercase transition-all duration-200 ${
                  isActive
                    ? "text-[#39ff14]"
                    : "text-[#71717a] hover:text-[#e4e4e7]"
                }`
              }
              style={{ fontFamily: "var(--font-mono)", fontSize: "0.72rem" }}
            >
              {({ isActive }) => (
                <span>
                  {isActive && <span style={{ color: "#39ff14" }}>{">"} </span>}
                  {item.label}
                </span>
              )}
            </NavLink>
          ))}
        </nav>

        {/* Status indicator */}
        <div className="hidden md:flex items-center gap-3">
          <div className="flex items-center gap-2">
            <span
              className="w-2 h-2 rounded-full animate-pulse"
              style={{ background: "#39ff14", boxShadow: "0 0 8px #39ff14" }}
            />
            <span style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#71717a" }}>
              verfügbar
            </span>
          </div>
        </div>

        {/* Mobile menu button */}
        <button
          className="md:hidden p-2 rounded"
          style={{ color: "#39ff14" }}
          onClick={() => setMenuOpen(!menuOpen)}
        >
          {menuOpen ? <X size={20} /> : <Menu size={20} />}
        </button>
      </div>

      {/* Mobile menu */}
      <AnimatePresence>
        {menuOpen && (
          <motion.div
            initial={{ opacity: 0, height: 0 }}
            animate={{ opacity: 1, height: "auto" }}
            exit={{ opacity: 0, height: 0 }}
            className="md:hidden overflow-hidden"
            style={{ background: "#09090b", borderTop: "1px solid rgba(57,255,20,0.15)" }}
          >
            <nav className="flex flex-col px-6 py-4 gap-1">
              {navItems.map((item) => (
                <NavLink
                  key={item.path}
                  to={item.path}
                  end={item.path === "/"}
                  className={({ isActive }) =>
                    `px-4 py-3 rounded text-sm uppercase tracking-wider transition-all ${
                      isActive ? "text-[#39ff14] bg-[rgba(57,255,20,0.08)]" : "text-[#71717a]"
                    }`
                  }
                  style={{ fontFamily: "var(--font-mono)", fontSize: "0.75rem" }}
                >
                  {item.label}
                </NavLink>
              ))}
            </nav>
          </motion.div>
        )}
      </AnimatePresence>
    </header>
  );
}
