{/* MARKER-MAKE-KIT-INVOKED */}
import { BrowserRouter, Routes, Route } from "react-router";
import "../styles/fonts.css";
import { Navigation } from "./components/Navigation";
import { Home } from "./components/pages/Home";
import { Projects } from "./components/pages/Projects";
import { About } from "./components/pages/About";
import { CV } from "./components/pages/CV";
import { News } from "./components/pages/News";
import { Contact } from "./components/pages/Contact";

export default function App() {
  return (
    <BrowserRouter>
      <div
        className="min-h-screen"
        style={{ background: "#09090b", color: "#e4e4e7", fontFamily: "var(--font-body)" }}
      >
        <Navigation />
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/projects" element={<Projects />} />
          <Route path="/about" element={<About />} />
          <Route path="/cv" element={<CV />} />
          <Route path="/news" element={<News />} />
          <Route path="/contact" element={<Contact />} />
        </Routes>

        {/* Footer */}
        <footer
          className="border-t mt-0"
          style={{ borderColor: "rgba(57,255,20,0.08)", background: "#0d0d10" }}
        >
          <div className="max-w-7xl mx-auto px-6 py-8 flex flex-wrap items-center justify-between gap-4">
            <span
              style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#3f3f46" }}
            >
              © 2025 Max Mustermann — Fachinformatiker für Anwendungsentwicklung
            </span>
            <span
              style={{ fontFamily: "var(--font-mono)", fontSize: "0.7rem", color: "#3f3f46" }}
            >
              gebaut mit{" "}
              <span style={{ color: "#39ff14" }}>React</span> &{" "}
              <span style={{ color: "#39ff14" }}>Tailwind CSS</span>
            </span>
          </div>
        </footer>
      </div>
    </BrowserRouter>
  );
}
