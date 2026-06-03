import React from "react";
import {AbsoluteFill, interpolate, spring, useCurrentFrame, useVideoConfig} from "remotion";

export type APESHeroLoopProps = {
  title: string;
  subtitle: string;
};

const palette = {
  primaryTeal: "#008C8C",
  deepTeal: "#005F5F",
  softMint: "#DDF3EF",
  warmSand: "#F2E9D8",
  charcoal: "#263238",
  donationCoral: "#E76F51",
};

export const APESHeroLoop: React.FC<APESHeroLoopProps> = ({title, subtitle}) => {
  const frame = useCurrentFrame();
  const {fps} = useVideoConfig();

  const titleProgress = spring({
    fps,
    frame,
    config: {damping: 18, stiffness: 130},
  });

  const subtitleOpacity = interpolate(frame, [18, 54], [0, 1], {
    extrapolateLeft: "clamp",
    extrapolateRight: "clamp",
  });

  const lineScale = interpolate(frame, [0, 72], [0.75, 1], {
    extrapolateLeft: "clamp",
    extrapolateRight: "clamp",
  });

  return (
    <AbsoluteFill
      style={{
        background: `linear-gradient(135deg, ${palette.deepTeal} 0%, ${palette.primaryTeal} 54%, ${palette.softMint} 100%)`,
        color: "white",
        fontFamily: '"Segoe UI", Aptos, sans-serif',
        overflow: "hidden",
      }}
    >
      <AbsoluteFill
        style={{
          background:
            "radial-gradient(circle at top left, rgba(242,233,216,0.34), transparent 34%), radial-gradient(circle at bottom right, rgba(231,111,81,0.18), transparent 26%)",
        }}
      />

      <div
        style={{
          display: "flex",
          flex: 1,
          alignItems: "center",
          justifyContent: "space-between",
          padding: "120px 132px",
          gap: 48,
        }}
      >
        <div style={{maxWidth: 980}}>
          <p
            style={{
              margin: 0,
              textTransform: "uppercase",
              letterSpacing: "0.18em",
              fontSize: 24,
              color: palette.warmSand,
            }}
          >
            APES CIC
          </p>
          <h1
            style={{
              margin: "22px 0 20px",
              fontSize: 108,
              lineHeight: 0.96,
              transform: `translateY(${(1 - titleProgress) * 46}px) scale(${0.94 + titleProgress * 0.06})`,
              opacity: titleProgress,
            }}
          >
            {title}
          </h1>
          <p
            style={{
              margin: 0,
              maxWidth: 780,
              fontSize: 34,
              lineHeight: 1.35,
              opacity: subtitleOpacity,
              color: "rgba(255,255,255,0.9)",
            }}
          >
            {subtitle}
          </p>
        </div>

        <div
          style={{
            width: 420,
            height: 420,
            borderRadius: 56,
            border: "1px solid rgba(255,255,255,0.16)",
            background: "rgba(255,255,255,0.08)",
            boxShadow: "0 28px 80px rgba(0,0,0,0.16)",
            backdropFilter: "blur(18px)",
            display: "grid",
            padding: 32,
            gap: 18,
            transform: `scale(${lineScale})`,
          }}
        >
          {[
            ["Rescue", palette.softMint],
            ["Rehabilitate", palette.warmSand],
            ["Rehome", palette.donationCoral],
            ["Educate", "#ffffff"],
          ].map(([label, colour], index) => {
            const rowDelay = index * 8;
            const rowOpacity = interpolate(frame, [rowDelay + 8, rowDelay + 28], [0, 1], {
              extrapolateLeft: "clamp",
              extrapolateRight: "clamp",
            });

            return (
              <div
                key={label}
                style={{
                  borderRadius: 24,
                  padding: "18px 20px",
                  background: "rgba(255,255,255,0.08)",
                  opacity: rowOpacity,
                }}
              >
                <div
                  style={{
                    display: "flex",
                    justifyContent: "space-between",
                    alignItems: "center",
                    fontSize: 30,
                    fontWeight: 700,
                  }}
                >
                  <span>{label}</span>
                  <span style={{color: String(colour)}}>•</span>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </AbsoluteFill>
  );
};
