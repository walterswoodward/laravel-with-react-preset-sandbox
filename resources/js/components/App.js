import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class App extends Component {
    constructor() {
        super();
        this.state = {
            videos: [],
        }
    }

    componentDidMount() {
        fetch('/api/videos')
            .then(response => {
                return response.json();
            })
            .then(videos => {
                this.setState({ videos });
            });
    }

    renderVideos() {
        return this.state.videos.map(video => {
            return (
                <li key={video.id}>{video.title}</li>
            );
        })
    }

    render() {
        return (
            <div>
                <ul>
                    {this.renderVideos()}
                </ul>
            </div>

        );
    }
}

export default App;

if (document.getElementById('root')) {
    ReactDOM.render(<App />, document.getElementById('root'));
}
