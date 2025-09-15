document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.getElementById("menuToggle");
  const mainMenu   = document.getElementById("mainMenu");

  const candidateForms = Array.from(document.querySelectorAll(
    'form[data-form="register"], #formRegistro, #registerForm, .register-card form, form'
  ));

  const isRegisterForm = (form) => {
    const pass  = form.querySelector('input[type="password"][name="password"], #password, [name="password"]');
    const pass2 = form.querySelector('#password_confirm, [name="password_confirm"], [name="password_confirmation"], [name="confirm_password"]');
    return !!(pass && pass2);
  };

  const setupRegisterForm = (form) => {
    const passInp  = form.querySelector('#password, [name="password"]');
    const pass2Inp = form.querySelector('#password_confirm, [name="password_confirm"], [name="password_confirmation"], [name="confirm_password"]');

    const terms  = form.querySelector('#terms, [name="terms"]');
    const policy = form.querySelector('#policy, [name="policy"]');

    const btnReg = form.querySelector('#btnRegister, [data-role="register"], button[type="submit"].btn-primary, button[type="submit"]');

    if (!passInp || !pass2Inp) return;

    const setFieldsInvalid = (invalid) => {
      [passInp, pass2Inp].forEach(el => {
        el.classList.toggle("is-invalid", invalid);
        el.setAttribute("aria-invalid", invalid ? "true" : "false");
      });
    };

    // Revisa coincidencia y opcionalmente muestra UI
    const checkPasswords = (showUI = false) => {
      const bothFilled = passInp.value.length > 0 && pass2Inp.value.length > 0;
      const mismatch   = bothFilled && passInp.value !== pass2Inp.value;

      if (mismatch) {
        pass2Inp.setCustomValidity("Las contraseñas no coinciden");
        setFieldsInvalid(true);
        if (showUI) {
          alert("Las contraseñas no coinciden");
          pass2Inp.reportValidity();
          pass2Inp.focus();
        }
        return false;
      } else {
        pass2Inp.setCustomValidity("");
        setFieldsInvalid(false);
        return true;
      }
    };

    // Habilita o deshabilita el botón según checks y contraseñas
    const syncRegisterState = () => {
      if (!btnReg) return;
      const checksOk = (terms ? terms.checked : true) && (policy ? policy.checked : true);
      const matchOk  = checkPasswords(false);
      btnReg.disabled = !(checksOk && matchOk);
    };

    // Listeners dentro del form
    passInp.addEventListener("input", syncRegisterState);
    pass2Inp.addEventListener("input", syncRegisterState);
    if (terms)  terms.addEventListener("change", syncRegisterState);
    if (policy) policy.addEventListener("change", syncRegisterState);
    syncRegisterState();

    // Bloquea envío si no coinciden
    form.addEventListener("submit", (e) => {
      if (!checkPasswords(true)) {
        e.preventDefault();
        e.stopPropagation();
      }
    });

    // bloquea por click del botón
    if (btnReg) {
      btnReg.addEventListener("click", (e) => {
        if (!checkPasswords(true)) {
          e.preventDefault();
          e.stopPropagation();
        }
      });
    }
  };

  // Configura cada form válido
  candidateForms
    .filter((f, i, arr) => arr.indexOf(f) === i)
    .filter(isRegisterForm)
    .forEach(setupRegisterForm);

/*
    MODAL LOGIN (igual que antes)
*/
  const modal = document.getElementById("loginModal");
  if (modal) {
    const openBtn  = document.querySelector('[data-open-modal="login"], #btnLogin');
    const closers  = modal.querySelectorAll("[data-close]");
    const emailInp = modal.querySelector('input[type="email"]');

    const openModal = () => {
      modal.classList.remove("hidden");
      modal.setAttribute("aria-hidden", "false");
      setTimeout(() => { if (emailInp) emailInp.focus(); }, 0);
    };

    const closeModal = () => {
      modal.classList.add("hidden");
      modal.setAttribute("aria-hidden", "true");
    };

    if (openBtn) openBtn.addEventListener("click", openModal);
    closers.forEach(el => el.addEventListener("click", closeModal));

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && !modal.classList.contains("hidden")) closeModal();
    });
  }

  /*
     MENÚ MÓVIL (igual que antes)
 */
  if (menuToggle && mainMenu) {
    const headerForToggle = menuToggle.closest("header") || document.querySelector("header");

    const setOpen = (open) => {
      if (!headerForToggle) return;
      headerForToggle.classList.toggle("menu-open", open);
      menuToggle.setAttribute("aria-expanded", open ? "true" : "false");
      if (window.innerWidth <= 900) {
        mainMenu.style.display = open ? "block" : "";
      } else {
        mainMenu.style.display = "";
      }
    };

    menuToggle.addEventListener("click", () => {
      const isOpen = headerForToggle.classList.contains("menu-open");
      setOpen(!isOpen);
    });

    window.addEventListener("resize", () => {
      if (window.innerWidth > 900 && headerForToggle.classList.contains("menu-open")) {
        setOpen(false);
      }
    });

    mainMenu.querySelectorAll("a").forEach(link => {
      link.addEventListener("click", () => {
        if (window.innerWidth <= 900 && headerForToggle.classList.contains("menu-open")) {
          setOpen(false);
        }
      });
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && headerForToggle.classList.contains("menu-open")) {
        setOpen(false);
      }
    });

    document.addEventListener("click", (e) => {
      if (window.innerWidth > 900) return; 
      const clickDentroMenu  = mainMenu.contains(e.target);
      const clickEnToggle    = menuToggle.contains(e.target);
      if (!clickDentroMenu && !clickEnToggle && headerForToggle.classList.contains("menu-open")) {
        setOpen(false);
      }
    });
  }
});
