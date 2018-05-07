import json
from maya.api import OpenMaya
dct = {"positions":[], "rotations":[],"scale":[], "id":[]}

sList = OpenMaya.MSelectionList()
sList.add("pSphere1")
meshDagPath = sList.getDagPath(0)
mesh = OpenMaya.MFnMesh(meshDagPath)
size = 50


def all_intersect(mesh, x, y, z, d):
    p = OpenMaya.MFloatPoint(x * 0.8, y * 0.96, z * 0.8)
    points = mesh.allIntersections(
        p, d, OpenMaya.MSpace.kWorld, 9999,
        False
    )
    if points[0]:
        return [(p.x, p.y, round(point.z / 0.80)) for point in points[0]]


dirX = OpenMaya.MFloatVector(1, 0, 0)
dirY = OpenMaya.MFloatVector(0, 1, 0)
dirZ = OpenMaya.MFloatVector(0, 0, 1)

for i in range(size):
    for j in range(size):
        pX = all_intersect(mesh, 0, i, j, dirX)
        print pX
        pY = all_intersect(mesh, i, 0, j, dirY)
        pZ = all_intersect(mesh, i, j, 0, dirZ)
        if pY[0]:
            for x in pY[0]:
                print x
