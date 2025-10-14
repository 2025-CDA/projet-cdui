export default function TimeLineRightContent({
    title,
    description,
    avatarUrl,
    userName,
}) {
    console.log(avatarUrl);
    return (
        <div className="grow pt-0.5 pb-8">
            <h5 className="flex gap-x-1.5 font-semibold text-gray-800">
                {title}
            </h5>
            <p className="mt-1 text-xs text-gray-600">{description}</p>
            <button
                type="button"
                className="mt-1 -ms-1 p-1 inline-flex items-center gap-x-2 text-xs rounded-lg border border-transparent text-gray-900 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
            >
                <img
                    className="shrink-0 size-4 rounded-full"
                    src={avatarUrl}
                    alt="Avatar"
                />
                {userName}
            </button>
        </div>
    );
}
