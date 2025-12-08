<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0" 
                xmlns:html="http://www.w3.org/TR/REC-html40"
                xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
    <xsl:template match="/">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <title>XML Sitemap</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <style type="text/css">
                    body {
                        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
                        color: #333;
                        max-width: 75rem;
                        margin: 0 auto;
                        padding: 2rem;
                    }
                    h1 {
                        font-size: 2.5rem;
                        font-weight: 600;
                        margin-bottom: 1rem;
                    }
                    p {
                        font-size: 1rem;
                        color: #666;
                        margin-bottom: 2rem;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        border: 1px solid #e2e8f0;
                        border-radius: 0.5rem;
                        overflow: hidden;
                        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                    }
                    th {
                        background-color: #f7fafc;
                        text-align: left;
                        padding: 1rem;
                        font-size: 0.875rem;
                        font-weight: 600;
                        text-transform: uppercase;
                        letter-spacing: 0.05em;
                        color: #4a5568;
                        border-bottom: 1px solid #e2e8f0;
                    }
                    td {
                        padding: 1rem;
                        font-size: 0.875rem;
                        border-bottom: 1px solid #e2e8f0;
                        color: #4a5568;
                    }
                    tr:last-child td {
                        border-bottom: none;
                    }
                    tr:hover td {
                        background-color: #f7fafc;
                    }
                    a {
                        color: #e53e3e;
                        text-decoration: none;
                        font-weight: 500;
                    }
                    a:hover {
                        text-decoration: underline;
                    }
                    .badge {
                        display: inline-block;
                        padding: 0.25rem 0.5rem;
                        border-radius: 9999px;
                        font-size: 0.75rem;
                        font-weight: 600;
                    }
                    .badge-daily { background-color: #def7ec; color: #03543f; }
                    .badge-weekly { background-color: #ebf8ff; color: #2c5282; }
                </style>
            </head>
            <body>
                <h1>XML Sitemap</h1>
                <p>
                    This is an XML Sitemap, meant for consumption by search engines like Google or Bing.
                    You can find more information about XML sitemaps on <a href="https://sitemaps.org">sitemaps.org</a>.
                </p>
                <table>
                    <thead>
                        <tr>
                            <th>URL</th>
                            <th>Priority</th>
                            <th>Change Frequency</th>
                            <th>Last Modified</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="sitemap:urlset/sitemap:url">
                            <tr>
                                <td>
                                    <a href="{sitemap:loc}">
                                        <xsl:value-of select="sitemap:loc"/>
                                    </a>
                                </td>
                                <td>
                                    <xsl:value-of select="sitemap:priority"/>
                                </td>
                                <td>
                                    <span class="badge badge-{sitemap:changefreq}">
                                        <xsl:value-of select="sitemap:changefreq"/>
                                    </span>
                                </td>
                                <td>
                                    <xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(' ', substring(sitemap:lastmod,12,5)))"/>
                                </td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>