export const IncrementButtonProgressBar = ({children, incrementProgressBar, progressBarState}) => {
    return (
        <>
            <button
                className={`bg-green-500 px-2 py-2 rounded-md w-fit`}
                onClick={() => {
                    incrementProgressBar(progressBarState.increment);
                }}
            >
                {children}
            </button>
        </>
    )
}
