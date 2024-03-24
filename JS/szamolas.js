var onCounting = false;

// if (onCounting) {
//   window.onbeforeunload = () => {
//     return "";
//   };
// }

var ts = 0;
var seconds = 0;
var minutes = 0;
var hours = 0;

const timer = () => {
  ts++;

  if (ts == 10) {
    seconds++;
    ts = 0;
  }

  if (seconds == 60) {
    minutes++;
    seconds = 0;
  }

  if (minutes == 60) {
    hours++;
    minutes = 0;
  }

  document.getElementById("milliseconds").innerHTML = ts;
  document.getElementById("seconds").innerHTML =
    seconds < 10 ? "0" + seconds : seconds;
  document.getElementById("minutes").innerHTML =
    minutes < 10 ? "0" + minutes : minutes;
  document.getElementById("hours").innerHTML = hours;
};
var data = {
  educator: document.getElementById("educator").value,
  word: document.getElementById("word").value,
};

// console.log(data);

const handleInputChange = (e) => {
  data = {
    ...data,
    [e.target.name]: e.target.value,
  };

  // console.log(data);
};

const startCounting = (e) => {
  e.preventDefault();

  //   if (data.educator == "") return;

  // window.onbeforeunload = () => {
  //     return "";
  // }

  setInterval(timer, 100);

  onCounting = true;

  document.getElementById("setup").style.display = "none";
  document.getElementById("oncounting").style.display = "block";
  document.getElementById("footer").style.display = "block";

  document.getElementById(
    "title-educator"
  ).innerText = `${data.educator} mondja:`;
  document.getElementById("title-word").innerText = data.word;
  document.getElementById("addtitle").innerText = data.word;
};

var wordCount = 0;

const addCount = () => {
  wordCount++;

  var now = new Date();

  document.getElementById("boxcontainer").innerHTML += `
  <div class="timebox">
      <p id="current-time">${now.getHours()}:${now.getMinutes() < 10 ? `0${now.getMinutes()}` : now.getMinutes()}:${now.getSeconds() < 10 ? `0${now.getSeconds()}` : now.getSeconds()}.${Math.round(now.getMilliseconds() / 100, 1)}</p>
      <p><b>${wordCount}</b>. ${hours}:${
    minutes < 10 ? `0${minutes}` : minutes
  }:${seconds < 10 ? `0${seconds}` : seconds}.${ts}</p>
      <p>${data.word}</p>
  </div>
`;
// itt feljebb template stringeket használtam, valamint ha a percek és a másodpercek kevesebbek 10-nél, eléjük ír egy 0-t

  document
    .getElementById("scroller")
    .scrollIntoView({ behavior: "smooth", block: "end" });
};
