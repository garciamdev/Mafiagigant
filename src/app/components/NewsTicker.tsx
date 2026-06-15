import { useEffect, useRef } from "react";
import { Radio } from "lucide-react";

interface NewsTickerProps {
  items: string[];
}

export function NewsTicker({ items }: NewsTickerProps) {
  const trackRef = useRef<HTMLDivElement>(null);

  const allItems = [...items, ...items]; // duplicate for seamless loop

  return (
    <div
      className="w-full overflow-hidden flex items-center gap-0"
      style={{
        background: "#39ff14",
        height: "36px",
        position: "relative",
      }}
    >
      {/* Label */}
      <div
        className="flex items-center gap-2 px-4 shrink-0 h-full z-10"
        style={{ background: "#050505", minWidth: "120px" }}
      >
        <Radio size={12} style={{ color: "#39ff14" }} />
        <span
          style={{
            fontFamily: "var(--font-mono)",
            fontSize: "0.65rem",
            color: "#39ff14",
            fontWeight: 700,
            letterSpacing: "0.1em",
            textTransform: "uppercase",
          }}
        >
          live
        </span>
      </div>

      {/* Scrolling text */}
      <div className="overflow-hidden flex-1 relative h-full flex items-center">
        <style>{`
          @keyframes ticker-scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
          }
          .ticker-track {
            display: flex;
            animation: ticker-scroll 40s linear infinite;
            white-space: nowrap;
          }
          .ticker-track:hover {
            animation-play-state: paused;
          }
        `}</style>
        <div className="ticker-track">
          {allItems.map((item, i) => (
            <span
              key={i}
              style={{
                fontFamily: "var(--font-mono)",
                fontSize: "0.72rem",
                color: "#050505",
                fontWeight: 600,
                paddingLeft: "3rem",
                paddingRight: "3rem",
                letterSpacing: "0.05em",
              }}
            >
              ◆ {item}
            </span>
          ))}
        </div>
      </div>
    </div>
  );
}
