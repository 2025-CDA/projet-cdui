import {Component} from "react";

export class ClassCount extends Component {

    constructor(props) {
        super(props);
        this.state = {
            count: 0,
            name: "",
        }
    }


    componentDidMount() {
        console.log("I am in componentDidMount");
        document.title = `You clicked ${this.state.count} times!`;
    }

    componentDidUpdate(prevProps, prevState, snapshot) {
        console.log("I am in componentDidUpdate");

        if (this.state.count !== prevState.count) {
            document.title = `You clicked ${this.state.count} times!`;
        }
    }

    render() {
        return (
            <>
                <h2 className={"text-3xl"}>Class Count</h2>
                <div className={"m-3"}>Count {this.state.count}</div>

                <button
                    onClick={() => this.setState({count: this.state.count + 1})}
                    className={"bg-gray-900 border border-gray-500 rounded-md px-3 py-2 m-3"}
                >
                    Count + 1
                </button>

                <input
                    className={"bg-gray-700 border border-gray-500 rounded-md px-3 py-2"}
                    type="text"
                    value={this.state.name}
                    onChange={
                        (e) => this.setState({name: e.target.value})
                    }
                />
            </>
        )
    }
}
