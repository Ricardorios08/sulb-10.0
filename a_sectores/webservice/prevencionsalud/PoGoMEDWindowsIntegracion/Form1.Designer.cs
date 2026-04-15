namespace PoGoMEDWindowsFormsClient
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.btnConsultarElegibilidad = new System.Windows.Forms.Button();
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.txtPass = new System.Windows.Forms.TextBox();
            this.label2 = new System.Windows.Forms.Label();
            this.txtUsr = new System.Windows.Forms.TextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.groupBox2 = new System.Windows.Forms.GroupBox();
            this.txtSitioEmisor = new System.Windows.Forms.TextBox();
            this.label5 = new System.Windows.Forms.Label();
            this.txtCuit = new System.Windows.Forms.TextBox();
            this.label6 = new System.Windows.Forms.Label();
            this.groupBox3 = new System.Windows.Forms.GroupBox();
            this.txtCredencial = new System.Windows.Forms.TextBox();
            this.label4 = new System.Windows.Forms.Label();
            this.txtAseguradoraCodigo = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.textBox1 = new System.Windows.Forms.TextBox();
            this.tabControl1 = new System.Windows.Forms.TabControl();
            this.tabPage1 = new System.Windows.Forms.TabPage();
            this.tabPage2 = new System.Windows.Forms.TabPage();
            this.textBox5 = new System.Windows.Forms.TextBox();
            this.btnSolicitarAutorizacion = new System.Windows.Forms.Button();
            this.txtPrestacionCodigo = new System.Windows.Forms.TextBox();
            this.label8 = new System.Windows.Forms.Label();
            this.txtPrestacionCantidad = new System.Windows.Forms.TextBox();
            this.label7 = new System.Windows.Forms.Label();
            this.textBox2 = new System.Windows.Forms.TextBox();
            this.button1 = new System.Windows.Forms.Button();
            this.tabPage3 = new System.Windows.Forms.TabPage();
            this.lblNumero = new System.Windows.Forms.Label();
            this.txtNumeroControlFinanciador = new System.Windows.Forms.TextBox();
            this.btnAnularPractica = new System.Windows.Forms.Button();
            this.textBox4 = new System.Windows.Forms.TextBox();
            this.txtPrestacion = new System.Windows.Forms.TextBox();
            this.label9 = new System.Windows.Forms.Label();
            this.label10 = new System.Windows.Forms.Label();
            this.comboBox1 = new System.Windows.Forms.ComboBox();
            this.solicitudAutorizacionBuscarPorNumeroSolicitudResponse1 = new PoGoMED.Integracion.ServiceClient.SolicitudAutorizacionBuscarPorNumeroSolicitudResponse();
            this.solicitudAutorizacionBuscarPorNumeroSolicitudResponse2 = new PoGoMED.Integracion.ServiceClient.SolicitudAutorizacionBuscarPorNumeroSolicitudResponse();
            this.groupBox1.SuspendLayout();
            this.groupBox2.SuspendLayout();
            this.groupBox3.SuspendLayout();
            this.tabControl1.SuspendLayout();
            this.tabPage1.SuspendLayout();
            this.tabPage2.SuspendLayout();
            this.tabPage3.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.solicitudAutorizacionBuscarPorNumeroSolicitudResponse1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.solicitudAutorizacionBuscarPorNumeroSolicitudResponse2)).BeginInit();
            this.SuspendLayout();
            // 
            // btnConsultarElegibilidad
            // 
            this.btnConsultarElegibilidad.Location = new System.Drawing.Point(16, 123);
            this.btnConsultarElegibilidad.Name = "btnConsultarElegibilidad";
            this.btnConsultarElegibilidad.Size = new System.Drawing.Size(254, 22);
            this.btnConsultarElegibilidad.TabIndex = 0;
            this.btnConsultarElegibilidad.Text = "Consultar Elegibilidad";
            this.btnConsultarElegibilidad.UseVisualStyleBackColor = true;
            this.btnConsultarElegibilidad.Click += new System.EventHandler(this.btnConsultarElegibilidad_Click);
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.txtPass);
            this.groupBox1.Controls.Add(this.label2);
            this.groupBox1.Controls.Add(this.txtUsr);
            this.groupBox1.Controls.Add(this.label1);
            this.groupBox1.Location = new System.Drawing.Point(12, 12);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(259, 78);
            this.groupBox1.TabIndex = 1;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Autenticación";
            // 
            // txtPass
            // 
            this.txtPass.Location = new System.Drawing.Point(75, 50);
            this.txtPass.Name = "txtPass";
            this.txtPass.Size = new System.Drawing.Size(178, 20);
            this.txtPass.TabIndex = 3;
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(6, 53);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(61, 13);
            this.label2.TabIndex = 2;
            this.label2.Text = "Contraseña";
            // 
            // txtUsr
            // 
            this.txtUsr.Location = new System.Drawing.Point(75, 24);
            this.txtUsr.Name = "txtUsr";
            this.txtUsr.Size = new System.Drawing.Size(178, 20);
            this.txtUsr.TabIndex = 1;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(6, 27);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(43, 13);
            this.label1.TabIndex = 0;
            this.label1.Text = "Usuario";
            // 
            // groupBox2
            // 
            this.groupBox2.Controls.Add(this.txtSitioEmisor);
            this.groupBox2.Controls.Add(this.label5);
            this.groupBox2.Controls.Add(this.txtCuit);
            this.groupBox2.Controls.Add(this.label6);
            this.groupBox2.Location = new System.Drawing.Point(12, 182);
            this.groupBox2.Name = "groupBox2";
            this.groupBox2.Size = new System.Drawing.Size(259, 76);
            this.groupBox2.TabIndex = 7;
            this.groupBox2.TabStop = false;
            this.groupBox2.Text = "Prestador";
            // 
            // txtSitioEmisor
            // 
            this.txtSitioEmisor.Location = new System.Drawing.Point(75, 49);
            this.txtSitioEmisor.Name = "txtSitioEmisor";
            this.txtSitioEmisor.Size = new System.Drawing.Size(178, 20);
            this.txtSitioEmisor.TabIndex = 11;
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(6, 53);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(61, 13);
            this.label5.TabIndex = 2;
            this.label5.Text = "Sitio Emisor";
            // 
            // txtCuit
            // 
            this.txtCuit.Location = new System.Drawing.Point(75, 23);
            this.txtCuit.Name = "txtCuit";
            this.txtCuit.Size = new System.Drawing.Size(178, 20);
            this.txtCuit.TabIndex = 9;
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(6, 27);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(32, 13);
            this.label6.TabIndex = 0;
            this.label6.Text = "CUIT";
            // 
            // groupBox3
            // 
            this.groupBox3.Controls.Add(this.txtCredencial);
            this.groupBox3.Controls.Add(this.label4);
            this.groupBox3.Controls.Add(this.txtAseguradoraCodigo);
            this.groupBox3.Controls.Add(this.label3);
            this.groupBox3.Location = new System.Drawing.Point(12, 98);
            this.groupBox3.Name = "groupBox3";
            this.groupBox3.Size = new System.Drawing.Size(259, 76);
            this.groupBox3.TabIndex = 6;
            this.groupBox3.TabStop = false;
            this.groupBox3.Text = "Aseguradora/Afiliado";
            // 
            // txtCredencial
            // 
            this.txtCredencial.Location = new System.Drawing.Point(117, 48);
            this.txtCredencial.MaxLength = 100;
            this.txtCredencial.Name = "txtCredencial";
            this.txtCredencial.Size = new System.Drawing.Size(130, 20);
            this.txtCredencial.TabIndex = 7;
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(8, 52);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(57, 13);
            this.label4.TabIndex = 8;
            this.label4.Text = "Credencial";
            // 
            // txtAseguradoraCodigo
            // 
            this.txtAseguradoraCodigo.Location = new System.Drawing.Point(117, 22);
            this.txtAseguradoraCodigo.MaxLength = 3;
            this.txtAseguradoraCodigo.Name = "txtAseguradoraCodigo";
            this.txtAseguradoraCodigo.Size = new System.Drawing.Size(92, 20);
            this.txtAseguradoraCodigo.TabIndex = 5;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(8, 25);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(103, 13);
            this.label3.TabIndex = 6;
            this.label3.Text = "Codigo Aseguradora";
            // 
            // textBox1
            // 
            this.textBox1.BackColor = System.Drawing.Color.White;
            this.textBox1.Location = new System.Drawing.Point(16, 12);
            this.textBox1.Multiline = true;
            this.textBox1.Name = "textBox1";
            this.textBox1.ReadOnly = true;
            this.textBox1.Size = new System.Drawing.Size(254, 100);
            this.textBox1.TabIndex = 8;
            this.textBox1.TabStop = false;
            this.textBox1.UseSystemPasswordChar = true;
            // 
            // tabControl1
            // 
            this.tabControl1.Controls.Add(this.tabPage1);
            this.tabControl1.Controls.Add(this.tabPage2);
            this.tabControl1.Controls.Add(this.tabPage3);
            this.tabControl1.Location = new System.Drawing.Point(13, 300);
            this.tabControl1.Name = "tabControl1";
            this.tabControl1.SelectedIndex = 0;
            this.tabControl1.Size = new System.Drawing.Size(311, 179);
            this.tabControl1.TabIndex = 9;
            this.tabControl1.TabStop = false;
            // 
            // tabPage1
            // 
            this.tabPage1.BackColor = System.Drawing.Color.Transparent;
            this.tabPage1.Controls.Add(this.textBox1);
            this.tabPage1.Controls.Add(this.btnConsultarElegibilidad);
            this.tabPage1.Location = new System.Drawing.Point(4, 22);
            this.tabPage1.Name = "tabPage1";
            this.tabPage1.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage1.Size = new System.Drawing.Size(303, 153);
            this.tabPage1.TabIndex = 0;
            this.tabPage1.Text = "Consultar elegibilidad";
            this.tabPage1.UseVisualStyleBackColor = true;
            // 
            // tabPage2
            // 
            this.tabPage2.BackColor = System.Drawing.Color.Transparent;
            this.tabPage2.Controls.Add(this.textBox5);
            this.tabPage2.Controls.Add(this.btnSolicitarAutorizacion);
            this.tabPage2.Controls.Add(this.txtPrestacionCodigo);
            this.tabPage2.Controls.Add(this.label8);
            this.tabPage2.Controls.Add(this.txtPrestacionCantidad);
            this.tabPage2.Controls.Add(this.label7);
            this.tabPage2.Controls.Add(this.textBox2);
            this.tabPage2.Controls.Add(this.button1);
            this.tabPage2.Location = new System.Drawing.Point(4, 22);
            this.tabPage2.Name = "tabPage2";
            this.tabPage2.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage2.Size = new System.Drawing.Size(303, 153);
            this.tabPage2.TabIndex = 1;
            this.tabPage2.Text = "Solicitar autorización";
            this.tabPage2.UseVisualStyleBackColor = true;
            // 
            // textBox5
            // 
            this.textBox5.BackColor = System.Drawing.Color.White;
            this.textBox5.Location = new System.Drawing.Point(16, 46);
            this.textBox5.Multiline = true;
            this.textBox5.Name = "textBox5";
            this.textBox5.ReadOnly = true;
            this.textBox5.Size = new System.Drawing.Size(254, 66);
            this.textBox5.TabIndex = 19;
            this.textBox5.TabStop = false;
            this.textBox5.UseSystemPasswordChar = true;
            // 
            // btnSolicitarAutorizacion
            // 
            this.btnSolicitarAutorizacion.Location = new System.Drawing.Point(16, 123);
            this.btnSolicitarAutorizacion.Name = "btnSolicitarAutorizacion";
            this.btnSolicitarAutorizacion.Size = new System.Drawing.Size(254, 22);
            this.btnSolicitarAutorizacion.TabIndex = 18;
            this.btnSolicitarAutorizacion.Text = "Solicitar Autorización";
            this.btnSolicitarAutorizacion.UseVisualStyleBackColor = true;
            this.btnSolicitarAutorizacion.Click += new System.EventHandler(this.btnSolicitarAutorizacion_Click);
            // 
            // txtPrestacionCodigo
            // 
            this.txtPrestacionCodigo.Location = new System.Drawing.Point(154, 14);
            this.txtPrestacionCodigo.MaxLength = 100;
            this.txtPrestacionCodigo.Name = "txtPrestacionCodigo";
            this.txtPrestacionCodigo.Size = new System.Drawing.Size(115, 20);
            this.txtPrestacionCodigo.TabIndex = 17;
            // 
            // label8
            // 
            this.label8.AutoSize = true;
            this.label8.Location = new System.Drawing.Point(113, 17);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(40, 13);
            this.label8.TabIndex = 16;
            this.label8.Text = "Código";
            // 
            // txtPrestacionCantidad
            // 
            this.txtPrestacionCantidad.Location = new System.Drawing.Point(66, 14);
            this.txtPrestacionCantidad.MaxLength = 3;
            this.txtPrestacionCantidad.Name = "txtPrestacionCantidad";
            this.txtPrestacionCantidad.Size = new System.Drawing.Size(34, 20);
            this.txtPrestacionCantidad.TabIndex = 15;
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Location = new System.Drawing.Point(15, 17);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(49, 13);
            this.label7.TabIndex = 14;
            this.label7.Text = "Cantidad";
            // 
            // textBox2
            // 
            this.textBox2.Location = new System.Drawing.Point(13, 325);
            this.textBox2.Multiline = true;
            this.textBox2.Name = "textBox2";
            this.textBox2.ReadOnly = true;
            this.textBox2.Size = new System.Drawing.Size(174, 71);
            this.textBox2.TabIndex = 13;
            this.textBox2.UseSystemPasswordChar = true;
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(193, 359);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(79, 37);
            this.button1.TabIndex = 9;
            this.button1.Text = "Solicitar Autorización";
            this.button1.UseVisualStyleBackColor = true;
            // 
            // tabPage3
            // 
            this.tabPage3.Controls.Add(this.lblNumero);
            this.tabPage3.Controls.Add(this.txtNumeroControlFinanciador);
            this.tabPage3.Controls.Add(this.btnAnularPractica);
            this.tabPage3.Controls.Add(this.textBox4);
            this.tabPage3.Controls.Add(this.txtPrestacion);
            this.tabPage3.Controls.Add(this.label9);
            this.tabPage3.Location = new System.Drawing.Point(4, 22);
            this.tabPage3.Name = "tabPage3";
            this.tabPage3.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage3.Size = new System.Drawing.Size(303, 153);
            this.tabPage3.TabIndex = 2;
            this.tabPage3.Text = "Anular Practica";
            this.tabPage3.UseVisualStyleBackColor = true;
            this.tabPage3.Click += new System.EventHandler(this.tabPage3_Click);
            // 
            // lblNumero
            // 
            this.lblNumero.AutoSize = true;
            this.lblNumero.Location = new System.Drawing.Point(12, 44);
            this.lblNumero.Name = "lblNumero";
            this.lblNumero.Size = new System.Drawing.Size(98, 13);
            this.lblNumero.TabIndex = 23;
            this.lblNumero.Text = "Control Financiador";
            // 
            // txtNumeroControlFinanciador
            // 
            this.txtNumeroControlFinanciador.Location = new System.Drawing.Point(124, 41);
            this.txtNumeroControlFinanciador.MaxLength = 100;
            this.txtNumeroControlFinanciador.Name = "txtNumeroControlFinanciador";
            this.txtNumeroControlFinanciador.Size = new System.Drawing.Size(115, 20);
            this.txtNumeroControlFinanciador.TabIndex = 22;
            this.txtNumeroControlFinanciador.Text = "83062887";
            // 
            // btnAnularPractica
            // 
            this.btnAnularPractica.Location = new System.Drawing.Point(15, 123);
            this.btnAnularPractica.Name = "btnAnularPractica";
            this.btnAnularPractica.Size = new System.Drawing.Size(254, 22);
            this.btnAnularPractica.TabIndex = 21;
            this.btnAnularPractica.Text = "Anular Practica";
            this.btnAnularPractica.UseVisualStyleBackColor = true;
            this.btnAnularPractica.Click += new System.EventHandler(this.button2_Click);
            // 
            // textBox4
            // 
            this.textBox4.BackColor = System.Drawing.Color.White;
            this.textBox4.Location = new System.Drawing.Point(15, 80);
            this.textBox4.Multiline = true;
            this.textBox4.Name = "textBox4";
            this.textBox4.ReadOnly = true;
            this.textBox4.Size = new System.Drawing.Size(254, 34);
            this.textBox4.TabIndex = 20;
            this.textBox4.TabStop = false;
            this.textBox4.UseSystemPasswordChar = true;
            // 
            // txtPrestacion
            // 
            this.txtPrestacion.Location = new System.Drawing.Point(124, 15);
            this.txtPrestacion.MaxLength = 100;
            this.txtPrestacion.Name = "txtPrestacion";
            this.txtPrestacion.Size = new System.Drawing.Size(115, 20);
            this.txtPrestacion.TabIndex = 19;
            this.txtPrestacion.Text = "42010100";
            // 
            // label9
            // 
            this.label9.AutoSize = true;
            this.label9.Location = new System.Drawing.Point(12, 18);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(40, 13);
            this.label9.TabIndex = 18;
            this.label9.Text = "Código";
            // 
            // label10
            // 
            this.label10.AutoSize = true;
            this.label10.Location = new System.Drawing.Point(18, 273);
            this.label10.Name = "label10";
            this.label10.Size = new System.Drawing.Size(47, 13);
            this.label10.TabIndex = 13;
            this.label10.Text = "Prepaga";
            // 
            // comboBox1
            // 
            this.comboBox1.FormattingEnabled = true;
            this.comboBox1.Items.AddRange(new object[] {
            "BIOMZA"});
            this.comboBox1.Location = new System.Drawing.Point(87, 265);
            this.comboBox1.Name = "comboBox1";
            this.comboBox1.Size = new System.Drawing.Size(178, 21);
            this.comboBox1.TabIndex = 12;
            this.comboBox1.SelectedIndexChanged += new System.EventHandler(this.comboBox1_SelectedIndexChanged);
            // 
            // solicitudAutorizacionBuscarPorNumeroSolicitudResponse1
            // 
            this.solicitudAutorizacionBuscarPorNumeroSolicitudResponse1.DataSetName = "SolicitudAutorizacionBuscarPorNumeroSolicitudResponse";
            this.solicitudAutorizacionBuscarPorNumeroSolicitudResponse1.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // solicitudAutorizacionBuscarPorNumeroSolicitudResponse2
            // 
            this.solicitudAutorizacionBuscarPorNumeroSolicitudResponse2.DataSetName = "SolicitudAutorizacionBuscarPorNumeroSolicitudResponse";
            this.solicitudAutorizacionBuscarPorNumeroSolicitudResponse2.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(861, 486);
            this.Controls.Add(this.label10);
            this.Controls.Add(this.comboBox1);
            this.Controls.Add(this.tabControl1);
            this.Controls.Add(this.groupBox3);
            this.Controls.Add(this.groupBox1);
            this.Controls.Add(this.groupBox2);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle;
            this.MaximizeBox = false;
            this.Name = "Form1";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "PoGoMED WinFormClient";
            this.Load += new System.EventHandler(this.Form1_Load);
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            this.groupBox2.ResumeLayout(false);
            this.groupBox2.PerformLayout();
            this.groupBox3.ResumeLayout(false);
            this.groupBox3.PerformLayout();
            this.tabControl1.ResumeLayout(false);
            this.tabPage1.ResumeLayout(false);
            this.tabPage1.PerformLayout();
            this.tabPage2.ResumeLayout(false);
            this.tabPage2.PerformLayout();
            this.tabPage3.ResumeLayout(false);
            this.tabPage3.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.solicitudAutorizacionBuscarPorNumeroSolicitudResponse1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.solicitudAutorizacionBuscarPorNumeroSolicitudResponse2)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button btnConsultarElegibilidad;
        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.TextBox txtUsr;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox txtPass;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.GroupBox groupBox2;
        private System.Windows.Forms.TextBox txtSitioEmisor;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.TextBox txtCuit;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.GroupBox groupBox3;
        private System.Windows.Forms.TextBox txtCredencial;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.TextBox txtAseguradoraCodigo;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.TextBox textBox1;
        private System.Windows.Forms.TabControl tabControl1;
        private System.Windows.Forms.TabPage tabPage2;
        private System.Windows.Forms.TabPage tabPage1;
        private System.Windows.Forms.TextBox textBox2;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.TextBox txtPrestacionCantidad;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.TextBox textBox5;
        private System.Windows.Forms.Button btnSolicitarAutorizacion;
        private System.Windows.Forms.TextBox txtPrestacionCodigo;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.TabPage tabPage3;
        private System.Windows.Forms.Button btnAnularPractica;
        private System.Windows.Forms.TextBox textBox4;
        private System.Windows.Forms.TextBox txtPrestacion;
        private System.Windows.Forms.Label label9;
        private System.Windows.Forms.Label lblNumero;
        private System.Windows.Forms.TextBox txtNumeroControlFinanciador;
        private System.Windows.Forms.Label label10;
        private System.Windows.Forms.ComboBox comboBox1;
        private PoGoMED.Integracion.ServiceClient.SolicitudAutorizacionBuscarPorNumeroSolicitudResponse solicitudAutorizacionBuscarPorNumeroSolicitudResponse1;
        private PoGoMED.Integracion.ServiceClient.SolicitudAutorizacionBuscarPorNumeroSolicitudResponse solicitudAutorizacionBuscarPorNumeroSolicitudResponse2;
    }
}

