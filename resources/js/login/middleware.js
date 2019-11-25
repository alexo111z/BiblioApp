const authMiddleware = () => {
    const sessionData = localStorage.getItem('userData');
    const redirectTo = '/login';
    const homeRoute = '/home';

    if (sessionData === null && location.pathname !== redirectTo) {
        toastr.error('No estás autenticado, inicia sesión');

        setTimeout(() => {
            location.href = location.origin + redirectTo;
        }, 2500);
    } else if (sessionData !== null && location.pathname === redirectTo) {
        location.href = location.origin + homeRoute;
    }
};

if (window.addEventListener) {
    window.addEventListener('load', authMiddleware, false);
} else {
    window.attachEvent('onload', authMiddleware);
}
