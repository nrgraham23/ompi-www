<?php
$topdir = "../../..";
$title = "MPI_Type_get_true_extent(3) man page (version 1.4.5)";
$meta_desc = "Open MPI v1.4.5 man page: MPI_TYPE_GET_TRUE_EXTENT(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Type_get_true_extent</b> - Returns the true lower bound and extent
of a data type&rsquo;s corresponding typemap, ignoring MPI_UB and MPI_LB markers.

<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Type_get_true_extent(MPI_Datatype datatype,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI_Aint *true_lb, MPI_Aint *true_extent)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_TYPE_GET_TRUE_EXTENT(DATATYPE, TRUE_LB, TRUE_EXTENT, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;DATATYPE, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) TRUE_LB, TRUE_EXTENT
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Datatype::Get_true_extent(MPI::Aint&amp; true_lb,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;MPI::Aint&amp; true_extent) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameter</a></h2>

<dl>

<dt>datatype       </dt>
<dd>Data type for which information is wanted
(handle). <p>
</dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>true_lb </dt>
<dd>True lower bound of data type (integer).
</dd>

<dt>true_extent </dt>
<dd>True size of data type (integer). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error
status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
The <i>true_lb</i> parameter returns the offset
of the lowest unit of store that is addressed by the data type, that is,
the lower bound of the corresponding typemap, ignoring MPI_LB markers. The
<i>true_extent</i> parameter returns the true size of the data type, that is,
the extent of the corresponding typemap, ignoring MPI_LB and MPI_UB markers,
and performing no rounding for alignment.  <p>
The <i>true_extent</i> is the minimum
number of bytes of memory necessary to hold a data type, uncompressed. <p>
See
Section 4.14.3 of the MPI-2 standard for more detailed definitions of these
parameters in relation to the typemap.
<p>
<h2><a name='sect8' href='#toc8'>Fortran 77 Notes</a></h2>
The MPI standard
prescribes portable Fortran syntax for the <i>TRUE_LB</i> and <i>TRUE_EXTENT</i> arguments
only for Fortran 90. FORTRAN 77 users may use the non-portable syntax <p>
<br>
<pre>     INTEGER*MPI_ADDRESS_KIND TRUE_LB
or
     INTEGER*MPI_ADDRESS_KIND TRUE_EXTENT
</pre><p>
where MPI_ADDRESS_KIND is a constant defined in mpif.h and gives the length
of the declared integer in bytes.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI:Exception object. <p>
Before
the error value is returned, the current MPI error handler is called. By
default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the
predefined error handler MPI_ERRORS_RETURN may be used to cause error values
to be returned. Note that MPI does not guarantee that an MPI program can
continue past an error.
<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax (see FORTRAN 77 NOTES)</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameter</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Fortran 77 Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
