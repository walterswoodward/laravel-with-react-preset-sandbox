const { default: axios } = require("axios");

function getVideos() {
    return axios.get('/videos');
}

async function logVideo(id) {
    // let videos = getVideos();
    // if (getVideos() == undefined) {
    //     console.log(videos[1]);
    // } else {
    //     // Without Async Await:
    //     console.log('This does not work b/c axios.get returns a ' + videos + ' request is asynchronous and has not completed yet');
    //     getVideos().then(response => {
    //         console.log("Since axios.get returns a Promise, request data must be returned using the Promise.prototype.then() method:\n");
    //         console.log(response.data[id]);
    //     })
    //     // With Async Await:
            let { data } = await getVideos();
            console.log(data[id]);
    // }


}

logVideo(0);
