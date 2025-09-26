import './App.css'
import {Test} from "./components/Test.jsx";
import {Todo} from "./components/useState/Todo.jsx";
import {ClassCount} from "./components/useEffect/ClassCount.jsx";
import {FunctionCount} from "./components/useEffect/FunctionCount.jsx";
import {Profile} from "./components/useContext/Profile.jsx";
import {ProfileData} from "./components/useContext/ProfileData.jsx";
import {useCallback, useState} from "react";
import {UserContext, ColorContext} from "./components/useContext/MyContext.jsx";
import {Count} from "./components/useReducer/Count.jsx";
import {ProgressBar} from "./components/useCallback/ProgressBar.jsx";
import {IncrementButtonProgressBar} from "./components/useCallback/IncrementButtonProgressBar.jsx";
import {DecrementButtonProgressBar} from "./components/useCallback/DecrementButtonProgressBar.jsx";
import {ClearButtonProgressBar} from "./components/useCallback/ClearButtonProgressBar.jsx";

import {BrowserRouter as Router, Routes, Route, Link} from 'react-router-dom';
import {Home} from "./pages/Home.jsx";
import {About} from "./pages/About.jsx";
import {Contact} from "./pages/Contact.jsx";
import {PrivateRoute} from "./components/PrivateRoute.jsx";
import {ClickSayHello} from "./components/customHooks/ClickSayHello.jsx";
import {CustomHooksMyContact} from "./components/customHooks/CustomHooksMyContact.jsx";


function App() {

    const [user, setUser] = useState({
        name: "Lisa",
        age: 8,
    })

    const [isAdmin, setIsAdmin] = useState(true); // ou false pour non-admin

    const [progressBarState, setProgressBarState] = useState({
        value: 0,
        btnColor: 'green',
        increment: 10,
        decrement: 10,
    });

    const incrementProgressBar = useCallback((increment) => {
        setProgressBarState((prev) => {
            if (prev.value < 100) {
                return {
                    ...prev,
                    value: prev.value + increment,
                }
            }
            return prev;
        });
    }, []);

    const decrementProgressBar = useCallback((decrement) => {
        setProgressBarState((prev) => {
            if (prev.value > 0) {
                return {
                    ...prev,
                    value: prev.value - decrement,
                }
            }
            return prev;
        });
    }, []);

    const clearProgressBar = useCallback(() => {
        setProgressBarState((prev) => {
            return {
                ...prev,
                value: 0,
            };
        });
    }, []);


    return (
        <>
            <Router>
                <nav className="
                flex justify-center items-center gap-20 mb-5 h-20
                bg-[linear-gradient(90deg,_rgba(132,42,155,1)_0%,_rgba(199,87,87,1)_50%,_rgba(237,175,83,1)_100%)]
                w-full
                ">
                    <Link to={"/"}>Home</Link> |
                    <Link to={"/about"}>About</Link> |
                    <Link to={"/contact"}>Contact</Link>
                </nav>

                <Routes>
                    <Route path="/" element={<Home/>}/>
                    <Route path="/about" element={<About/>}/>
                    <Route path="/contact" element={
                        <PrivateRoute isAdmin={isAdmin}>
                            <Contact user={user}/>
                        </PrivateRoute>
                    }/>
                </Routes>
            </Router>

            {/*<h1 className={"text-white text-5xl m-5"}>useState Hook</h1>*/}
            {/*<Test>Kikoo</Test>*/}
            {/*<Todo></Todo>*/}
            {/*<hr className={"text-white m-5"}/>*/}
            {/*<ClassCount></ClassCount>*/}
            {/*<hr className={"text-white m-5"}/>*/}
            {/*<FunctionCount></FunctionCount>*/}

            {/*<h1 className={"text-white text-5xl m-5"}>useReducer Hook</h1>*/}
            {/*<Test>Kikoo</Test>*/}
            {/*<Count></Count>*/}


            {/*<h1 className={"text-white text-5xl m-5"}>useContext Hook</h1>*/}
            {/*<Test>Kikoo</Test>*/}
            {/*<hr className={"text-white m-5"}/>*/}
            {/*<UserContext.Provider value={user}>*/}
            {/*    <ColorContext.Provider value={"blue"}>*/}
            {/*        <Profile></Contact>*/}
            {/*    </ColorContext.Provider>*/}
            {/*</UserContext.Provider>*/}

            <hr className={"text-white m-5"}/>

            <h1 className={"text-white text-5xl m-5"}>Custom Hooks</h1>

            <ClickSayHello></ClickSayHello>

            <hr className={"text-white m-5"}/>

            <CustomHooksMyContact></CustomHooksMyContact>

            {/*<h1 className={"text-white text-5xl m-5"}>useCallback Hook</h1>*/}

            {/*<ProgressBar progressBarState={progressBarState}></ProgressBar>*/}
            {/*<div className={"flex justify-center items-center gap-5"}>*/}
            {/*    <IncrementButtonProgressBar*/}
            {/*        progressBarState={progressBarState}*/}
            {/*        incrementProgressBar={incrementProgressBar}*/}
            {/*    >+ %</IncrementButtonProgressBar>*/}
            {/*    <DecrementButtonProgressBar*/}
            {/*        progressBarState={progressBarState}*/}
            {/*        decrementProgressBar={decrementProgressBar}*/}
            {/*    >- %</DecrementButtonProgressBar>*/}
            {/*    <ClearButtonProgressBar*/}
            {/*        clearProgressBar={clearProgressBar}*/}
            {/*    >Clear</ClearButtonProgressBar>*/}
            {/*</div>*/}
        </>
    )
}

export default App
