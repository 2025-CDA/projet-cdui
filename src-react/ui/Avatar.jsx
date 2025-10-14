function Avatar({
    url = "https://avatar.iran.liara.run/public/7",
    size = 8,
    color = "primary",
}) {
    return (
        <img
            className={`my-3 inline-block size-${size} rounded-full outline-2 outline-${color}`}
            src={url}
            alt="Avatar"
        />
    );
}

export default Avatar;
