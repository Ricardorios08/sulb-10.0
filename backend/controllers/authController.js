const User = require('../models/User');
const jwt = require('jsonwebtoken');

const login = async (req, res) => {
  try {
    const { usuario, contrasena } = req.body;

    const user = await User.findOne({ where: { usuario } });

    if (!user) {
      return res.status(401).json({ message: 'Usuario no encontrado' });
    }

    // Passwords are plain text integers in the legacy DB
    if (user.contrasena.toString() !== contrasena.toString()) {
      return res.status(401).json({ message: 'Contraseña incorrecta' });
    }

    const token = jwt.sign(
      { id: user.id, usuario: user.usuario, rol: user.rol },
      process.env.JWT_SECRET,
      { expiresIn: '8h' }
    );

    res.json({
      token,
      user: {
        id: user.id,
        usuario: user.usuario,
        rol: user.rol
      }
    });
  } catch (error) {
    res.status(500).json({ message: error.message });
  }
};

module.exports = {
  login
};
