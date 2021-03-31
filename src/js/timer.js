let dt = new Date(new Date().setTime(0));
let ctime = dt.getTime();
let secs= Math.floor((ctime % (1000 * 60))/ 1000);
let mins = Math.floor((ctime % (1000 * 60 * 60))/( 1000 * 60));
let seconds = 60
window.minutes;
window.hrs;
console.log(seconds, minutes);
let time = 0;
let mytime = setInterval(function(){
        // time++;
        
        if(seconds < 61 && seconds > 0) {
            seconds--;
        } else if(minutes < 61 && minutes > 0) {
            seconds = 59;
            minutes--;
        }
        else
        {
            minutes = 59;
            seconds = 59;
            hrs--;
        }
        let formatted_hr = hrs < 10 ? `0${hrs}`: `${hrs}`;
        let formatted_sec = seconds < 10 ? `0${seconds}`: `${seconds}`;
        let formatted_min = minutes < 10 ? `0${minutes}`: `${minutes}`
        document.querySelector("span.time").innerHTML = `${formatted_hr} : ${formatted_min} : ${formatted_sec}`;
    }, 1000);
let mytime2 = setInterval(function(){
        time++;
        
        if(secs < 59) {
            secs++;
        } else {
            secs = 0;
            mins++;
        }
        window.formatted_secs = secs < 10 ? `0${secs}`: `${secs}`;
        window.formatted_mins = mins < 10 ? `0${mins}`: `${mins}`
        // document.querySelector("span.time").innerHTML = `${formatted_min} : ${formatted_sec}`;
    }, 1000);
