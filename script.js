function showLoginMessage(card) {
  card.classList.add("blur");
  document.getElementById("login-message").classList.add("active");
}

function closeLoginMessage() {
  const blurredCards = document.querySelectorAll(".card.blur");
  blurredCards.forEach((card) => card.classList.remove("blur"));
  document.getElementById("login-message").classList.remove("active");
}
