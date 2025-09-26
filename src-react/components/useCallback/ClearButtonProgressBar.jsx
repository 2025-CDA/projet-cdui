export const ClearButtonProgressBar = ({children, clearProgressBar}) => {
    return (
        <>
            <button
                className={`bg-blue-500 px-2 py-2 rounded-md w-fit`}
                onClick={() => {
                    clearProgressBar()
                }}
            >
                {children}
            </button>
        </>
    )
}
