<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
  <h2>Novel Books recommend by Aspiring Innovation</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th style="text-align:left">Book ID</th>
      <th style="text-align:left">Name</th>
      <th style="text-align:left">Author</th>
      <th style="text-align:left">Description</th>
      <th style="text-align:left">Published</th>
    </tr>
    <xsl:for-each select="books/book">
    <tr>
      <td><xsl:value-of select="id" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="author" /></td>
      <td><xsl:value-of select="description" /></td>
      <td><xsl:value-of select="published" /></td>
    </tr>
    </xsl:for-each>
  </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>
