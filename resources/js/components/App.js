import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Video from './Video.js';

class App extends Component {
    constructor() {
        super();
        this.state = {
            videos: [],
            currentVideo: null
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

    handleClick(video) {
        this.setState({currentVideo: video});
    }

    renderVideos() {
        return this.state.videos.map(video => {
            return (
                <button className="list-group-item btn" onClick={() => this.handleClick(video)} key={video.id}>{video.title}</button>
            );
        })
    }

    render() {
        return (
            <div className="d-md-flex h-md-100 align-items-center">
                <div className="col-md-3 p-0 bg-indigo h-md-100">
                    <ul className="list-group">
                        {this.renderVideos()}
                    </ul>
                </div>
                <Video video={this.state.currentVideo} />
            </div>
        );
    }
}

export default App;

if (document.getElementById('root')) {
    ReactDOM.render(<App />, document.getElementById('root'));
}
