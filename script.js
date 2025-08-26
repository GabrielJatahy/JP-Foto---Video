// Seleciona todos os elementos com a classe scroll-reveal
const scrollElements = document.querySelectorAll(".scroll-reveal");

// Função que verifica se o elemento está visível na tela
const elementInView = (el, dividend = 1) => {
    const elementTop = el.getBoundingClientRect().top;
    return (
        elementTop <=
        (window.innerHeight || document.documentElement.clientHeight) / dividend
    );
};

// Ativa a animação adicionando a classe "active"
const displayScrollElement = (element) => {
    element.classList.add("active");
};

// Remove a animação (opcional)
const hideScrollElement = (element) => {
    element.classList.remove("active");
};

// Função principal para ativar/desativar elementos ao rolar
const handleScrollAnimation = () => {
    scrollElements.forEach((el) => {
        if (elementInView(el, 1.25)) {
            displayScrollElement(el);
        } else {
            hideScrollElement(el);
        }
    });
};

// Evento de scroll que chama a função
window.addEventListener("scroll", () => {
    handleScrollAnimation();
});

// Chamada inicial para ativar elementos já visíveis
handleScrollAnimation();
