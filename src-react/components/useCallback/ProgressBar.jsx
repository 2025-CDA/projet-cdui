import {memo} from "react";

const ProgressBar = ({progressBarState}) => {
    return (
        <>
            {console.log(progressBarState)}
            
            <div className="flex flex-col justify-center items-center gap-5 m-5 w-full">
                <p className="text-2xl font-bold mb-2">{progressBarState.value} %</p>
                <div className="w-[50%] h-6 bg-gray-200 rounded overflow-hidden">
                    <div
                        className={
                        `h-full 
                        bg-blue-500
                        bg-[length:20px_20px] 
                        [background-image:linear-gradient(45deg,rgba(255,255,255,0.3)_25%,transparent_25%,transparent_50%,rgba(255,255,255,0.3)_50%,rgba(255,255,255,0.3)_75%,transparent_75%,transparent)] 
                        transition-all
                        duration-500
                        w-[${progressBarState.value}%]
                        `}
                    ></div>
                </div>
            </div>
        </>
    )
}

const MemoizedProgressBar = memo(ProgressBar);

export { MemoizedProgressBar as ProgressBar };
