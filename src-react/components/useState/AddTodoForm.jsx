import {useState} from "react";

export const AddTodoForm = ({addNewTodo, handleTyping}) => {
    
    const [newTodo, setNewTodo] = useState("");
    
    console.log(newTodo);
    
    const handleSubmit = (e) => {
        e.preventDefault();
        addNewTodo(newTodo);
        setNewTodo("");
    }
    
    const handleInputText = (e) => {
     setNewTodo(e.target.value);
        handleTyping();
    }

    return (
        <>
            <div>
                <h2 className={"m-5"}>Form</h2>
                <form className={"flex flex-col gap-4"}
                      onSubmit={handleSubmit}
                      action=""
                >

                    <label htmlFor="">Add Todo</label>
                    <input
                        className={"bg-gray-700 border border-gray-500 rounded-md px-3 py-2"}
                        type="text"
                        value={newTodo}
                        onChange={handleInputText}
                    />
                    <input 
                        className={"bg-gray-900 border border-gray-500 rounded-md px-3 py-2"}
                        type="submit"
                    />
                </form>
                
            </div>
        </>
    )
}
