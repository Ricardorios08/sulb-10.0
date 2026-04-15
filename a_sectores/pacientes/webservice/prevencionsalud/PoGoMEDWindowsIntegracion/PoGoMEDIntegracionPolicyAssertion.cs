using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Microsoft.Web.Services3.Design;
using Microsoft.Web.Services3;
using System.Xml;

namespace PoGoMED.Integracion.ServiceClient
{
    public class PoGoMEDIntegracionPolicyAssertion : PolicyAssertion
    {
        // Methods
        public override SoapFilter CreateClientInputFilter(FilterCreationContext context)
        {
            return new ClientInputFilter();
        }

        public override SoapFilter CreateClientOutputFilter(FilterCreationContext context)
        {
            return new ClientOutputFilter();
        }

        public override SoapFilter CreateServiceInputFilter(FilterCreationContext context)
        {
            return new ServiceInputFilter();
        }

        public override SoapFilter CreateServiceOutputFilter(FilterCreationContext context)
        {
            return new ServiceOutputFilter();
        }

        public override IEnumerable<KeyValuePair<string, Type>> GetExtensions()
        {
            return new KeyValuePair<string, Type>[] { new KeyValuePair<string, Type>("PoGoMEDIntegracionPolicyAssertion", base.GetType()) };
        }

        public override void ReadXml(XmlReader reader, IDictionary<string, Type> extensions)
        {
            reader.ReadStartElement("PoGoMEDIntegracionPolicyAssertion");
        }
    }

    public class ClientInputFilter : SoapFilter
    {
        // Methods
        public override SoapFilterResult ProcessMessage(SoapEnvelope envelope)
        {
            return SoapFilterResult.Continue;
        }
    }

    public class ClientOutputFilter : SoapFilter
    {
        // Fields
        public const string PRESTADOR_IDENTIFICADOR = "PrestadorIdentificador";
        public const string PRESTADOR_IDENTIFICADOR_TIPO = "PrestadorIdentificadorTipo";

        // Methods
        public override SoapFilterResult ProcessMessage(SoapEnvelope envelope)
        {
            XmlNode header = envelope.Header;
            if (envelope.Context["PrestadorIdentificadorTipo"] != null)
            {
                XmlNode newChild = envelope.CreateNode(XmlNodeType.Element, "PrestadorIdentificadorTipo", "http://PoGoMED.Autorizaciones.DataContracts/2008/04");
                newChild.InnerText = envelope.Context["PrestadorIdentificadorTipo"].ToString();
                header.AppendChild(newChild);
            }
            if (envelope.Context["PrestadorIdentificador"] != null)
            {
                XmlNode node3 = envelope.CreateNode(XmlNodeType.Element, "PrestadorIdentificador", "http://PoGoMED.Autorizaciones.DataContracts/2008/04");
                node3.InnerText = envelope.Context["PrestadorIdentificador"].ToString();
                header.AppendChild(node3);
            }
            return SoapFilterResult.Continue;
        }
    }

    public class ServiceInputFilter : SoapFilter
    {
        // Methods
        public override SoapFilterResult ProcessMessage(SoapEnvelope envelope)
        {
            return SoapFilterResult.Continue;
        }
    }

    public class ServiceOutputFilter : SoapFilter
    {
        // Methods
        public override SoapFilterResult ProcessMessage(SoapEnvelope envelope)
        {
            return SoapFilterResult.Continue;
        }
    }
}