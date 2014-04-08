<?php
$topdir = "../../..";
$title = "MPI_Graph_neighbors(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_GRAPH_NEIGHBORS(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Graph_neighbors </b> - Returns the neighbors of a node associated
with a graph topology.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Graph_neighbors(MPI_Comm comm, int rank, int maxneighbors,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int neighbors[])
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_GRAPH_NEIGHBORS(COMM, RANK, MAXNEIGHBORS, NEIGHBORS, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, RANK, MAXNEIGHBORS, NEIGHBORS(*), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void Graphcomm::Get_neighbors(int rank, int maxneighbors,
<tt> </tt>&nbsp;<tt> </tt>&nbsp;int neighbors[]) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator with graph topology (handle). </dd>

<dt>rank </dt>
<dd>Rank
of process in group of comm (integer). </dd>

<dt>maxneighbors </dt>
<dd>Size of array neighbors
(integer).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>neighbors </dt>
<dd>Ranks of processes that are neighbors
to specified process (array of integers). </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status
(integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
<b>Example:</b>  Suppose that comm is a communicator with
a shuffle-exchange topology. The group has 2n members. Each process is labeled
by <i>a(1)</i>,&nbsp;..., <i>a(n)</i> with a(i) E{0,1}, and has three neighbors: exchange (<i>a(1)</i>,&nbsp;...,
<i>a(n)</i> = <i>a(1)</i>,&nbsp;..., a(n-1), <i>a(n)</i> (a = 1 - a), shuffle (<i>a(1)</i>,&nbsp;..., <i>a(n)</i>) = <i>a(2)</i>,&nbsp;..., <i>a(n)</i>,
<i>a(1)</i>, and unshuffle (<i>a(1)</i>,&nbsp;..., <i>a(n)</i>) = <i>a(n)</i>, <i>a(1)</i>,&nbsp;..., a(n-1). The graph adjacency
list is illustrated below for n=3. <p>
<br>
<pre>        <tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;exchange<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;shuffle<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;unshuffle
    node<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;neighbors(1)<tt> </tt>&nbsp;<tt> </tt>&nbsp;neighbors(2)<tt> </tt>&nbsp;<tt> </tt>&nbsp;neighbors(3)
    0(000)<tt> </tt>&nbsp;<tt> </tt>&nbsp;    1<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    0<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    0
    1(001)<tt> </tt>&nbsp;<tt> </tt>&nbsp;    0<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    2<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    4
    2(010)<tt> </tt>&nbsp;<tt> </tt>&nbsp;    3<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    4<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    1
    3(011)<tt> </tt>&nbsp;<tt> </tt>&nbsp;    2<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    6<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    5
    4(100)<tt> </tt>&nbsp;<tt> </tt>&nbsp;    5<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    1<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    2
    5(101)<tt> </tt>&nbsp;<tt> </tt>&nbsp;    4<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    3<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    6
    6(110)<tt> </tt>&nbsp;<tt> </tt>&nbsp;    7<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    5<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    3
    7(111)<tt> </tt>&nbsp;<tt> </tt>&nbsp;    6<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    7<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;<tt> </tt>&nbsp;    7
</pre><p>
Suppose that the communicator comm has this topology associated with it.
The following code fragment cycles through the three types of neighbors
and performs an appropriate permutation for each. <p>
<br>
<pre>C  assume: each process has stored a real number A.
C  extract neighborhood information
      CALL <a href="../man3/MPI_Comm_rank.3.php">MPI_COMM_RANK</a>(comm, myrank, ierr)
      CALL MPI_GRAPH_NEIGHBORS(comm, myrank, 3, neighbors, ierr)
C  perform exchange permutation
      CALL <a href="../man3/MPI_Sendrecv_replace.3.php">MPI_SENDRECV_REPLACE</a>(A, 1, MPI_REAL, neighbors(1), 0,
     +     neighbors(1), 0, comm, status, ierr)
C  perform shuffle permutation
      CALL <a href="../man3/MPI_Sendrecv_replace.3.php">MPI_SENDRECV_REPLACE</a>(A, 1, MPI_REAL, neighbors(2), 0,
     +     neighbors(3), 0, comm, status, ierr)
C  perform unshuffle permutation
      CALL <a href="../man3/MPI_Sendrecv_replace.3.php">MPI_SENDRECV_REPLACE</a>(A, 1, MPI_REAL, neighbors(3), 0,
     +     neighbors(2), 0, comm, status, ierr)
</pre>
<h2><a name='sect8' href='#toc8'>Errors</a></h2>
Almost all MPI routines return an error value; C routines as the
value of the function and Fortran routines in the last argument. C++ functions
do not return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect9' href='#toc9'>See Also</a></h2>
<p>
<a href="../man3/MPI_Graph_neighbors_count.3.php">MPI_Graph_neighbors_count</a>
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
