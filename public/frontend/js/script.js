document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const switchToRegister = document.getElementById("switch-to-register");
    const switchToLogin = document.getElementById("switch-to-login");
    const container = document.getElementById("container");

    // Fonction pour gérer la transition entre formulaires
    function switchForms(fromForm, toForm) {
        fromForm.classList.remove("active");
        
        // Animation de rotation 3D
        container.style.transform = 'rotateY(180deg)';
        
        setTimeout(() => {
            toForm.classList.add("active");
            container.style.transform = 'rotateY(0)';
        }, 400);
    }

    // Événement pour passer au formulaire d'inscription
    switchToRegister.addEventListener("click", () => {
        switchForms(loginForm, registerForm);
    });

    // Événement pour passer au formulaire de connexion
    switchToLogin.addEventListener("click", () => {
        switchForms(registerForm, loginForm);
    });

    // Effets de focus sur les inputs
    document.querySelectorAll('input').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.querySelector('i').style.color = '#FF6F00';
        });

        input.addEventListener('blur', function() {
            this.parentElement.querySelector('i').style.color = '';
        });
    });

    // Animation de survol sur les boutons
    document.querySelectorAll('.cta-button').forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.02)';
        });

        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Afficher par défaut la section "Se connecter"
    loginForm.classList.add("active");
});
