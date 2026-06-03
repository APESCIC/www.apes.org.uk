import React from "react";
import {Composition, Folder} from "remotion";
import {APESHeroLoop} from "./components/APESHeroLoop";

export const RemotionRoot: React.FC = () => {
  return (
    <Folder name="APES-Motion">
      <Composition
        id="APESHeroLoop"
        component={APESHeroLoop}
        durationInFrames={240}
        fps={30}
        width={1920}
        height={1080}
        defaultProps={{
          title: "Rescue. Rehabilitate. Rehome.",
          subtitle: "Compassionate support for exotic species and the people who care for them.",
        }}
      />
    </Folder>
  );
};

