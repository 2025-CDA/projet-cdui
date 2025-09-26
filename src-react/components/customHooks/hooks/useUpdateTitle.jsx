import {useEffect, useState} from "react";

export const useUpdateTitle = (titleText) => {
    
    useEffect(() => {
        // console.dir(document);
        document.title = titleText;
    }, [titleText])

    return (
        <>

        </>
    )
}
