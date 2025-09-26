import {v4 as uuidv4} from 'uuid';
import {useState} from "react";
import {AddTodoForm} from "./AddTodoForm.jsx";

export const Todo = () => {

    const [warning, setWarning] = useState(false);

    const [todos, setTodos] = useState([
        {id: uuidv4(), todo: "Buy milk"},
        {id: uuidv4(), todo: "Buy bread"},
        {id: uuidv4(), todo: "Buy apples"},
    ]);

    const warningMsg =
        warning &&
        <div className={"inline-block bg-red-600 px-6 py-2 rounded-full"}>
            This input need to contain a todo.
        </div>;

    const handleTyping = () => {
        if (warning) {
            setWarning(false);
        }
    };

    const addNewTodo = (newTodo) => {
        if (newTodo !== "" && newTodo.replace(/\s+/g, '') !== "") {
            warning ? setWarning(false) : null;

            setTodos([...todos, {
                id: uuidv4(),
                todo: newTodo,
            }]);

        } else {
            setWarning(true);
        }
    }

    console.log(todos)

    const todoMap = todos.map((todo, index) => {
        return (<li className={"m-5"} key={index}>Todo {index + 1}: {todo.todo}</li>)
    })

    return (
        <>
            <div className={"m-5"}>
                <h2 className={"text-3xl"}>Todo List</h2>
                <hr className={"my-5"}/>
                <h3>{todos.length ? `You have ${todos.length} things to do:` : null}</h3>
                <ul>{todoMap}</ul>
            </div>
            <hr className={"my-5"}/>
            {warningMsg}
            <AddTodoForm addNewTodo={addNewTodo} handleTyping={handleTyping}></AddTodoForm>
        </>
    )
}
