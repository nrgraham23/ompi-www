<?php
$topdir = "../../..";
$title = "MPI_Graph_get(3) man page (version 1.10.1)";
$meta_desc = "Open MPI v1.10.1 man page: MPI_GRAPH_GET(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
     <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Graph_get </b> - Retrieves graph topology information associated
with a communicator.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Graph_get(MPI_Comm comm, int maxindex, int maxedges,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int index[], int edges[])
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_GRAPH_GET(COMM, MAXINDEX, MAXEDGES, INDEX, EDGES, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, MAXINDEX, MAXEDGES, INDEX(*)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;EDGES(*), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Graphcomm::Get_topo(int maxindex, int maxedges,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int index[], int edges[]) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator with graph structure (handle). </dd>

<dt>maxindex
</dt>
<dd>Length of vector index in the calling program (integer). </dd>

<dt>maxedges </dt>
<dd>Length
of vector edges in the calling program (integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>index
</dt>
<dd>Array of integers containing the graph structure (for details see the definition
of <a href="../man3/MPI_Graph_create.3.php">MPI_Graph_create</a>). </dd>

<dt>edges </dt>
<dd>Array of integers containing the graph structure.
</dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
Functions <a href="../man3/MPI_Graphdims_get.3.php">MPI_Graphdims_get</a>
and MPI_Graph_get retrieve the graph-topology information that was associated
with a communicator by <a href="../man3/MPI_Graph_create.3.php">MPI_Graph_create</a>. <p>
The information provided by <a href="../man3/MPI_Graphdims_get.3.php">MPI_Graphdims_get</a>
can be used to dimension the vectors index and edges correctly for a call
to MPI_Graph_get.
<p>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value;
C routines as the value of the function and Fortran routines in the last
argument. C++ functions do not return errors. If the default error handler
is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception
mechanism will be used to throw an MPI::Exception object. <p>
Before the error
value is returned, the current MPI error handler is called. By default,
this error handler aborts the MPI job, except for I/O function errors. The
error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined
error handler MPI_ERRORS_RETURN may be used to cause error values to be
returned. Note that MPI does not guarantee that an MPI program can continue
past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<a href="../man3/MPI_Graph_create.3.php">MPI_Graph_create</a> <br>

<p><a href="../man3/MPI_Graphdims_get.3.php">MPI_Graphdims_get</a>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Errors</a></li>
<li><a name='toc9' href='#sect9'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
