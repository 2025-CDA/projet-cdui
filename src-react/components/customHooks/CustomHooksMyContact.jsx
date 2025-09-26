import {Search} from "./Search.jsx";
import {useState} from "react";

export const CustomHooksMyContact = () => {

    const [search, setSearch] = useState("");
    
    const handleChange = (e) => {
        setSearch(e.target.value);
    }

    return (
        <>
            <Search search={search} searchHandler={handleChange}></Search>
        </>
    )
}
