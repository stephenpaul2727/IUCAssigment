<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:output method="html" />

    <xsl:template match="/degrees">
        <html>
            <head>
                <title>List of Degrees at IU.</title>
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></link>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            </head>
            <body>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <xsl:apply-templates select="degree[1]" mode="header"/>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:apply-templates select="degree" mode="rows"/>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>

    <xsl:template match="degree" mode="header">
        <xsl:for-each select="attribute::*">
            <th><xsl:value-of select="local-name(.)" /></th>
        </xsl:for-each>
    </xsl:template>

    <xsl:template match="degree" mode="rows">
        <tr>
            <xsl:for-each select="attribute::*">
                <td><xsl:value-of select="." /></td>
            </xsl:for-each>
        </tr>
    </xsl:template>

</xsl:stylesheet>