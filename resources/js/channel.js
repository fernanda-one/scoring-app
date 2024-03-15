require("./bootstrap");
export const joinChanel = (channel, roomId) => {
    return Echo.join(`presence.${channel}.${roomId}`);
};
