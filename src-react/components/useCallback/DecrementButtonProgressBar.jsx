export const DecrementButtonProgressBar = ({children, decrementProgressBar, progressBarState}) => {
    return (
        <>
            <button
                className={`bg-red-500 px-2 py-2 rounded-md w-fit`}
                onClick={() => {
                    decrementProgressBar(progressBarState.decrement);
                }}
            >
                {children}
            </button>
        </>
    )
}
