import {Component} from "react";

export class ClassState extends Component {

    constructor(props) {
        super(props);
        this.state = {
            counter: 0,
            previousCounter: null,
        }
    }

    addOne = () => {
        this.setState((prevState) => {
            return {
                counter: prevState.counter + 1,
                previousCounter: prevState.counter
            }
        })
    }

    render() {
        return (
            <>
                <div className={"m-5 flex flex-col gap-4"}>
                    <h2 className={"text-3xl"}>Class State</h2>
                    <p> Counter: {this.state.counter}</p>
                    <p> Previous Counter Value: {this.state.previousCounter ? this.state.previousCounter : 0}</p>
                    <button className={"bg-blue-950 py-4 px-6 rounded-2xl"} onClick={this.addOne}>Increment Counter</button>
                </div>
            </>
        )
    }
}
