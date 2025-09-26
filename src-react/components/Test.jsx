export const Test = ({children}) => {
    return (
        <>
            <div className={"flex justify-center"}>
                <div className={"bg-red-700 px-2 py-2 rounded-md w-fit"}>
                    {children}
                </div>
            </div>
        </>
    )
}
