// var onCounting = false;

// if (onCounting) {
//   window.onbeforeunload = () => {
//     return "";
//   };
// }

window.onload = () => {
  window.scrollTo(0, 0);
};

const addZero = (val) => {
  return val < 10 ? `0${val}` : val;
};

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
// var difs = [];

var realTimes = [];
var stopwatchTimes = [];

const addCount = () => {
  wordCount++;
  var now = new Date();

  var nowStr = `${now.getHours()}:${addZero(now.getMinutes())}:${addZero(
    now.getSeconds()
  )}.${Math.floor(now.getMilliseconds() / 100, 1)}`;

  realTimes.push(nowStr);

  var stopwatch = `${hours}:${addZero(minutes)}:${addZero(seconds)}.${ts}`;

  stopwatchTimes.push(stopwatch);

  document.getElementById("boxcontainer").innerHTML += `
    <div class="timebox">
        <p id="current-time">${nowStr}</p>
        <p><b>${wordCount}</b>. ${stopwatch}</p>
        <p>${data.word}</p>
    </div>
`;
  // itt feljebb template stringeket használtam, valamint ha a percek és a másodpercek kevesebbek 10-nél, eléjük ír egy 0-t

  document
    .getElementById("scroller")
    .scrollIntoView({ behavior: "smooth", block: "end" });
};

const stopTimer = () => {
  // document.getElementById("oncounting").style.display = "none";
  document.getElementById("footer").style.display = "none";

  document.getElementById("boxcontainer").innerHTML += `
    <h2 id="sumtitle">Az előadásnak vége. 🥹<br>${data.educator} ${wordCount}x mondta, hogy: ${data.word}</h2>
    <button id="savebtn" onclick={download()}>
        Letöltés
    </button>
    <button id="resetbtn" onclick={reset()}>
        Újra
    </button>
  `;

  clearInterval(timer);
};

const download = () => {
  const now = new Date();
  var csv = "Valós idő;Stopper idő\n";

  for (let i = 0; i < wordCount; i++) {
    csv += `${realTimes[i]};${stopwatchTimes[i]}\n`;
  }

  csv += `Összesen:;${wordCount}\n`;

  const blob = new Blob([csv], { type: "text/csv" });
  const link = document.createElement("a");
  link.href = window.URL.createObjectURL(blob);
  link.download = `${data.educator}-${data.word}_${now.getFullYear()}-${addZero(
    now.getMonth()
  )}-${addZero(now.getDate())}-${addZero(now.getHours())}${addZero(
    now.getMinutes()
  )}.csv`;
  link.click();
};

const reset = () => {
  // document
  //   .getElementById("title-educator")
  //   .scrollIntoView({ behavior: "smooth" });

  location.reload();
};
