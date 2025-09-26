export const Search = ({search, searchHandler}) => {
    return (
        <>
            <input
                className={"bg-gray-700 border border-gray-500 rounded-md px-3 py-2"}
                type="text"
                placeholder="Search..."
                value={search}
                onChange={(e) => {searchHandler(e)}}
            />

        </>
    )
}
