import React from 'react';
const styles = "col-md-9 p-0 bg-white h-md-100 ";
const inner = "d-md-flex h-md-100 p-5 justify-content-center flex-column";
const center = "text-center";
const Video = ({video}) => {
  if (!video) {
    return(<h2 className={styles + center}>Click on a title to see details </h2>);
  }

  return(
    <div className={styles}>
        <div className={inner}>
            <h2> {video.title} </h2>
            <p> {video.description} </p>
            <h3> Status {video.availability ? 'Available' : 'Out of stock'} </h3>
            <h3> Price : {video.price} </h3>
        </div>
    </div>
  )
}

export default Video ;
