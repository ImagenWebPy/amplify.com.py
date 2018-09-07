<?php

class Contacto_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function contenido() {
        $sql = $this->db->select("SELECT * FROM contacto where id = 1;");
        return $sql[0];
    }

    public function contacto($datos) {
        $data = array();
        $sql = $this->db->select("SELECT email FROM contacto where id = 1;");
        $emailAmplify = $sql[0]['email'];
        $nombre = $datos['nombre'];
        $email = $datos['email'];
        $mensaje = $datos['mensaje'];
        $telefono = $datos['telefono'];
        if ((!empty($nombre)) && (!empty($email)) && (!empty($mensaje))) {
            $this->db->insert('frm_contacto', array(
                'nombre' => utf8_decode($nombre),
                'email' => $email,
                'mensaje' => utf8_decode($mensaje),
                'ip' => $this->helper->getReal_ip(),
                'fecha' => date('Y-m-d H:i:s'),
                'telefono' => utf8_decode($telefono)
            ));
            $asunto = 'Formulario de Contacto';
            $message = "Este mensaje fue enviado por " . $nombre . chr(10) . chr(13);
            $message .= "Desde la sgte Ip: " . $this->helper->getReal_ip() . chr(10) . chr(13);
            $message .= "E-mail: " . $email . chr(10) . chr(13);
            $message .= "Teléfono:" . $telefono . chr(10) . chr(13);
            $message .= "Mensaje:" . $mensaje . chr(10) . chr(13);
            $message .= "Enviado el " . date('Y-m-d H:i:s');
            $this->helper->sendMail($emailAmplify, $asunto, $message);
            $data = '<i class="fa fa-check-circle-o" aria-hidden="true" style="font-size: 25px;"></i> Gracias por ponerte en contacto con nosotros. Su mensaje ha sido enviado.';
            return $data;
        }
    }

}
