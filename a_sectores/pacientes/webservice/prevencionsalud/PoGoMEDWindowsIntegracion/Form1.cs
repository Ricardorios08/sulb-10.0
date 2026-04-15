using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using PoGoMED.Integracion.ServiceClient;
using Microsoft.Web.Services3.Security.Tokens;


namespace PoGoMEDWindowsFormsClient
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            //Por default selecciono el primer Item del Combo
            comboBox1.SelectedIndex = 0;
        }

        #region btnConsultarElegibilidad_Click
        private void btnConsultarElegibilidad_Click(object sender, EventArgs e)
        {
            textBox5.Text = string.Empty;
            Cursor currentCursor = Cursor.Current;
            Cursor.Current = Cursors.WaitCursor;
            groupBox1.Enabled = false;
            groupBox2.Enabled = false;
            groupBox3.Enabled = false;
            tabControl1.Enabled = false;

            try
            {
                #region Consultar Elegibilidad
                AutorizacionPoGoMEDService serviceClient = new AutorizacionPoGoMEDService();
                UsernameToken usernameToken = new UsernameToken(txtUsr.Text, txtPass.Text, PasswordOption.SendPlainText);
                serviceClient.Url = "https://www.pogomed.com:8002/AutorizacionPoGoMEDService.svc";
                serviceClient.SetClientCredential(usernameToken);
                serviceClient.SetPolicy("usernameTokenSecurity");
                serviceClient.RequestSoapContext.Add("PrestadorIdentificadorTipo", "IdentificadorTributario");
                serviceClient.RequestSoapContext.Add("PrestadorIdentificador", txtCuit.Text.Trim());


                ConsultaDeElegibilidadRequest request = new ConsultaDeElegibilidadRequest();
                request.AdmisionTipo = AdmisionTipo.P;
                request.Afiliado = new Afiliado();
                request.Afiliado.AfiliadoIdentificador = new PacienteIdentificador();
                request.Afiliado.AfiliadoIdentificador.AfiliadoIdentificadorTipoId = AfiliadoIdentificadorAfiliadoIdentificadorTipo.HC; //Credencial
                request.Afiliado.AfiliadoIdentificador.Identificador = txtCredencial.Text;
                request.Aseguradora = new Aseguradora();
                request.Aseguradora.Codigo = txtAseguradoraCodigo.Text; //"SMG" = Swiss Medical Group
                request.IdentificadorIngresoModo = IdentificadorIngresoModo.M; //"M" = Ingreso Manual de Identificador
                request.PrestadorDomicilioAtencionCodigo = txtSitioEmisor.Text;
                request.ServicioAreaId = ServicioArea.O; //"O" = Ambulatorio

                ConsultaDeElegibilidadResponse response = serviceClient.ConsultarElegibilidad(request);

                textBox1.Text = "Afiliado: " + response.Afiliado.Nombres + " " + response.Afiliado.Apellidos;
                textBox1.Text = textBox1.Text + Environment.NewLine + "Resultado: " + response.ElegibilidadResultado.Descripcion;
                #endregion
            }

            catch (Exception ex)
            {
                textBox1.Text = ex.Message;
            }

            finally
            {
                groupBox1.Enabled = true;
                groupBox2.Enabled = true;
                groupBox3.Enabled = true;
                tabControl1.Enabled = true;
                Cursor.Current = currentCursor;
            }
        }
        #endregion

        #region btnSolicitarAutorizacion_Click
        private void btnSolicitarAutorizacion_Click(object sender, EventArgs e)
        {
            textBox1.Text = string.Empty;
            Cursor currentCursor = Cursor.Current;
            Cursor.Current = Cursors.WaitCursor;
            groupBox1.Enabled = false;
            groupBox2.Enabled = false;
            groupBox3.Enabled = false;
            tabControl1.Enabled = false;

            try
            {
                #region Solicitud Autorizacion
                AutorizacionPoGoMEDService serviceClient = new AutorizacionPoGoMEDService();
                UsernameToken usernameToken = new UsernameToken(txtUsr.Text, txtPass.Text, PasswordOption.SendPlainText);
                serviceClient.Url = "https://www.pogomed.com:8002/AutorizacionPoGoMEDService.svc";
                serviceClient.SetClientCredential(usernameToken);
                serviceClient.SetPolicy("usernameTokenSecurity");
                serviceClient.RequestSoapContext.Add("PrestadorIdentificadorTipo", "IdentificadorTributario");
                serviceClient.RequestSoapContext.Add("PrestadorIdentificador", txtCuit.Text);

                NotificacionDeRealizacionDePracticaRequest request = new NotificacionDeRealizacionDePracticaRequest();
                request.AdmisionTipo = AdmisionTipo.P; //P = Programada, G = Guardia, U = Urgencia
                request.Afiliado = new Afiliado();
                request.Afiliado.AfiliadoIdentificador = new PacienteIdentificador();
                request.Afiliado.AfiliadoIdentificador.AfiliadoIdentificadorTipoId = AfiliadoIdentificadorAfiliadoIdentificadorTipo.HC; //Credencial
                request.Afiliado.AfiliadoIdentificador.Identificador = txtCredencial.Text;
                request.Aseguradora = new Aseguradora();
                request.Aseguradora.Codigo = txtAseguradoraCodigo.Text; //"SMG" = Swiss Medical Group
                request.IdentificadorIngresoModo = IdentificadorIngresoModo.M; //"M" = Ingreso Manual de Identificador
                request.PrestadorDomicilioAtencionCodigo = txtSitioEmisor.Text;
                request.ServicioAreaId = ServicioArea.O; //"O" = Ambulatorio
                request.FechaRealizacion = DateTime.Now;

                // Prestación
                PrestacionSolicitada prestacion = new PrestacionSolicitada();
                prestacion.Cantidad = Int16.Parse(txtPrestacionCantidad.Text); // Cantidad solicitada de una Prestación
                prestacion.Especialidad = new Especialidad(); // La especialidad del Prestador
                prestacion.Especialidad.Codigo = "*"; // * = PoGoMED (Swiss Medical no informa especialidad)
                prestacion.Prestacion = new Prestacion();
                prestacion.Prestacion.Codigo = txtPrestacionCodigo.Text;
                // PreAutorizacion no es obligatorio. Si se informa un número hay que informar la fecha también
                //prestacion.PreAutorizacion = new PreAutorizacion();
                //prestacion.PreAutorizacion.Numero = "1";
                //prestacion.PreAutorizacion.Fecha = DateTime.Now;

                //PrestacionSolicitada prestacion2 = new PrestacionSolicitada();
                //prestacion2.Cantidad = Int16.Parse(txtPrestacionCantidad.Text); // Cantidad solicitada de una Prestación
                //prestacion2.Especialidad = new Especialidad(); // La especialidad del Prestador
                //prestacion2.Especialidad.Codigo = "*"; // * = PoGoMED (Swiss Medical no informa especialidad)
                //prestacion2.Prestacion = new Prestacion();
                //prestacion2.Prestacion.Codigo = "412";
                //// PreAutorizacion no es obligatorio. Si se informa un número hay que informar la fecha también
                //prestacion.PreAutorizacion = new PreAutorizacion();
                //prestacion.PreAutorizacion.Numero = "1";
                //prestacion.PreAutorizacion.Fecha = DateTime.Now;

                // Agregar la Prestación a la colección
                request.PrestacionesSolicitadas = new PrestacionSolicitada[1] { prestacion };
                //request.PrestacionesSolicitadas = new PrestacionSolicitada[2] { prestacion, prestacion2 };

                //MatriculaArgentina objMatricula = new MatriculaArgentina();
                //objMatricula.Tipo = PrestadorIdentificadorPrestadorIdentificadorTipo.Matricula;
                //objMatricula.ProfesionalTipo = MatriculaArgentinaProfesionalesTipos.M;
                //objMatricula.Origen = MatriculaArgentinaOrigenes.MP;
                //objMatricula.Provincia = MatriculaArgentinaProvincias.A;
                //objMatricula.Identificador = "1370"; 

                NotificacionDeRealizacionDePracticaResponse response = serviceClient.NotificarRealizacionDePractica(request);

                textBox5.Text = "Afiliado: " + response.Afiliado.Nombres + " " + response.Afiliado.Apellidos;
                // Si está autorizado mostrar el nro de autorización
                if (response.PrestacionesSolicitadasResultados[0].AutorizacionNumero.Trim() != string.Empty)
                    textBox5.Text = textBox5.Text + Environment.NewLine + "Número autorización: " + response.PrestacionesSolicitadasResultados[0].AutorizacionNumero;
                // Si NO está autorizado monstrar la descripción del motivo
                else
                {
                    if (response.PrestacionesSolicitadasResultados[0].AutorizacionMensajes.Length > 0)
                        textBox5.Text = textBox5.Text + Environment.NewLine + "Resultado: " + response.PrestacionesSolicitadasResultados[0].AutorizacionMensajes[0].Descripcion;
                }
                #endregion
            }

            catch (Exception ex)
            {
                textBox5.Text = ex.Message;
            }

            finally
            {
                groupBox1.Enabled = true;
                groupBox2.Enabled = true;
                groupBox3.Enabled = true;
                tabControl1.Enabled = true;
                Cursor.Current = currentCursor;
            }
        }
        #endregion

        private void Form1_Load(object sender, EventArgs e)
        {
            CargarBioquimicosMendoza();
        }

        private void CargarBioquimicosMendoza()
        {
            this.txtUsr.Text = "sa_integracion";
            this.txtPass.Text = "sa2014";
            this.txtCuit.Text = "30123456789";
            this.txtAseguradoraCodigo.Text = "BIOMZA";
            this.txtCredencial.Text = "014066370011";//Credencial de Prueba BIOMZA
            this.txtSitioEmisor.Text = "PGIA00020433";
        }
        
        private void button2_Click(object sender, EventArgs e)
        {
            textBox1.Text = string.Empty;
            Cursor currentCursor = Cursor.Current;
            Cursor.Current = Cursors.WaitCursor;
            groupBox1.Enabled = false;
            groupBox2.Enabled = false;
            groupBox3.Enabled = false;
            tabControl1.Enabled = false;

            try
            {
                #region Anulacion de Prestacion
                AutorizacionPoGoMEDService serviceClient = new AutorizacionPoGoMEDService();
                UsernameToken usernameToken = new UsernameToken(txtUsr.Text, txtPass.Text, PasswordOption.SendPlainText);
                serviceClient.Url = "https://www.pogomed.com:8002/AutorizacionPoGoMEDService.svc";
                serviceClient.SetClientCredential(usernameToken);
                serviceClient.SetPolicy("usernameTokenSecurity");
                serviceClient.RequestSoapContext.Add("PrestadorIdentificadorTipo", "IdentificadorTributario");
                serviceClient.RequestSoapContext.Add("PrestadorIdentificador", txtCuit.Text);

                AnulacionDeRealizacionDePracticaRequest anulacionDePracticaRquest = new AnulacionDeRealizacionDePracticaRequest();
                anulacionDePracticaRquest.AdmisionTipo = AdmisionTipo.P; //P = Programada, G = Guardia, U = Urgencia
                anulacionDePracticaRquest.Afiliado = new Afiliado();
                anulacionDePracticaRquest.Afiliado.AfiliadoIdentificador = new PacienteIdentificador();
                anulacionDePracticaRquest.Afiliado.AfiliadoIdentificador.AfiliadoIdentificadorTipoId = AfiliadoIdentificadorAfiliadoIdentificadorTipo.HC; //Credencial
                anulacionDePracticaRquest.Afiliado.AfiliadoIdentificador.Identificador = txtCredencial.Text;
                anulacionDePracticaRquest.Aseguradora = new Aseguradora();
                anulacionDePracticaRquest.Aseguradora.Codigo = txtAseguradoraCodigo.Text; //"SMG" = Swiss Medical Group
                anulacionDePracticaRquest.IdentificadorIngresoModo = IdentificadorIngresoModo.M; //"M" = Ingreso Manual de Identificador
                anulacionDePracticaRquest.PrestadorDomicilioAtencionCodigo = txtSitioEmisor.Text.Trim();
                anulacionDePracticaRquest.NumeroControlFinanciador = txtNumeroControlFinanciador.Text.Trim();
                anulacionDePracticaRquest.ServicioAreaId = ServicioArea.O; //"O" = Ambulatorio

                // Prestación
                Prestacion prestacion = new Prestacion();
                prestacion.Codigo = txtPrestacion.Text;
                //prestacion.Descripcion = "Consulta Medica";
                anulacionDePracticaRquest.Prestaciones = new Prestacion[1] { prestacion };
                
                
                AnulacionDeRealizacionDePracticaResponse anulacionDePracticaResponse = serviceClient.AnularNotificacionDePracticaRealizada(anulacionDePracticaRquest);
                string strResultado = "";
                foreach (PrestacionAnuladaResultado prestacionAnulacionResultado in anulacionDePracticaResponse.PrestacionesAnuladasResultados)
                {
                    strResultado = strResultado + prestacionAnulacionResultado.AnulacionResultado.Id.ToString();
                }
                textBox4.Text = strResultado;

                #endregion
            }

            catch (Exception ex)
            {
                textBox4.Text = ex.Message;
            }

            finally
            {
                groupBox1.Enabled = true;
                groupBox2.Enabled = true;
                groupBox3.Enabled = true;
                tabControl1.Enabled = true;
                Cursor.Current = currentCursor;
            }

        }

        private void tabPage3_Click(object sender, EventArgs e)
        {

        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {
            switch (comboBox1.SelectedIndex)
            {
                case 0: //BIOMZA
                    CargarBioquimicosMendoza();
                    break;
                default:
                    break;
            }
        }
    }
}
