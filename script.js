var news = ["Today will be a nice and warm wather.", 
    "Never give up, because it's the last key that unlocks the door.",
    "Why is it hard for programmers to find love? They’re searching for the perfect code in everything", 
    "Cats have a unique nose print.", 
    "Set realistic goals to avoid burnout.", 
    "Take breaks; even heroes need rest!",
    "What you are looking for is looking for you!",
    "A student can do it all: prepare for an exam in 12 hours and drink coffee all night!"];

function showRandomNews() {
    var randomIndex = Math.floor(Math.random() * news.length);
    document.write(news[randomIndex]);
}